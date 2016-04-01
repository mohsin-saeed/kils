<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
/*use Illuminate\Support\Facades\Input;
use App\author;
//use Hash;

use Illuminate\Support\Facades\View;

class authorController extends Controller
{


    public function index()
    {

        return view ('author/author_signup');
    }
    public function create_author()
    {
        $input['name'] = Input::get('name');
        $input['email'] = Input::get('email');
         $input['username'] = Input::get('username');
         $input['password'] = Input::get('password');
        //var_dump($input);exit;

        author::create($input);
    }
    //log in

    public function author_login_page()
    {
        return view ('author/author_login');
    }
    public function author_login_authentication()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if(DB::table('author')->select('username','password')->where('username','=',$username)->where('password','=',$password)->get())
        {
            return view('author/author_page');
        }

        else
        {
            return "fail";
        }
    }

}
*/