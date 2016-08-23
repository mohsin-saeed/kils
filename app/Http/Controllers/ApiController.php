<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\student;
use App\categories;
use App\books;
//use Hash;

use Illuminate\Support\Facades\View;

class ApiController extends Controller
{

    public function categories(){
        $categoriesObj = new categories();
        $categories = $categoriesObj->all();;
        $categories = $categories->toArray();
        //$categories = json_encode($categories);

        return $this->_sendResponse($categories, 0, '');
    }

    public function books(){
        $booksObj = new books();
        $books = $booksObj->all();;
        $books = $books->toArray();
        //$categories = json_encode($categories);

        return $this->_sendResponse($books, 0, '');
    }

    public function _sendResponse($data, $error, $errorMessage){
        $response["data"] = $data;
        $response["error"] = $error;
        $response["errorMessage"] = $errorMessage;
        return json_encode($response);
    }

}
