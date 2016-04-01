<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\admin;
use Hash;

use Illuminate\Support\Facades\View;

/*class adminController extends Controller {

    public function index()
    {

        return view('admin/admin_login');
    }

    public function admin_creation()
    {

        $input['username']= Input::get('username');
        $input['password']= Input::get('password');
        admin::create($input);

    }

    public function admin_authentication()
    {
        $username1=Input::get('username');
        $password1=Input::get('password');

        if(DB::table('admin')->select('username','password')->where('username','=',$username1)->where('password','=',$password1)->get())
        {


            return view ('admin/admin_page');
        }

        else
        {
            return "Access denied";
        }
    }

    public function getIndex()
    {

        $users = DB::table('users')->where('name','amjad')->first();

        echo "<pre>";
        var_dump($users->name);




    }
    public  function test()
    {
        return "mehsam";
    }


}*/
