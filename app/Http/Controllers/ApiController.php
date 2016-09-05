<?php namespace App\Http\Controllers;

use App\Services\Registrar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\student;
use App\categories;
use App\books;
use App\Videos;
use App\Quiz;
use App\Questions;

//use Hash;

use Illuminate\Support\Facades\View;

class ApiController extends Controller
{

    public function categories() {
        $categoriesObj = new categories();
        $categories    = $categoriesObj->all();;
        $categories = $categories->toArray();
        //$categories = json_encode($categories);

        return $this->_sendResponse($categories, 0, '');
    }

    public function books() {
        $booksObj = new books();
        $books    = $booksObj->all();;
        $books = $books->toArray();
        //$categories = json_encode($categories);

        return $this->_sendResponse($books, 0, '');
    }

    public function _sendResponse($data, $error, $errorMessage) {
        $response[ "data" ]         = $data;
        $response[ "error" ]        = $error;
        $response[ "errorMessage" ] = $errorMessage;
        return json_encode($response);
    }

    public function login(Request $request) {
        if(!$request->has('email') || !$request->has('password')) {
            return [
                'error'   => 1,
                'message' => 'Email and password required'
            ];
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Auth::user();
        } else {
            return [
                'error'   => 1,
                'message' => 'Invalid credentials'
            ];
        }
    }

    public function register(Request $request, Registrar $registrar) {
        $validator = $registrar->validator($request->all());

        if ($validator->fails())
        {
            return [
                'error'   => 1,
                'message' => 'Invalid parameters'
            ];
        }

        $registrar->create($request->all());

        return [
            'error'   => 0,
            'message' => 'Registered successfully. You login now by using your credentials'
        ];
    }

    public function videos(){
        $video_obj=new Videos();
        $videos=$video_obj->all();

        foreach($videos as &$video){
            $video->thumbnail_url = "https://i.ytimg.com/vi/".$video->thumbnail."/hqdefault.jpg";
        }

        $videos=$videos->toArray();
        return $this->_sendResponse($videos,0,'');
    }

    public function quizes(){
        $quize_obj=new Quiz();
        $quizes=$quize_obj->all();
        $quizes=$quizes->toArray();
        return($this->_sendResponse($quizes,0,''));
    }
    public function questions(){
        $questions_obj=new Questions();
        $questions=$questions_obj->all();
        $questions=$questions->toArray();
        return($this->_sendResponse($questions,0,''));
    }

}
