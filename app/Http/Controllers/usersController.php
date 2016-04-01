<?php namespace App\Http\Controllers;

use App\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Hash;

use Illuminate\Support\Facades\View;

class usersController extends Controller
{

    public function index()
    {

        return view('admin/admin_login');
    }

    public function create_admin()
    {

        $input['user_id']= Input::get('username');
        $input['password']= Input::get('password');
        users::create($input);

    }

    public function admin_authentication()
    {
        $username1=Input::get('username');
        $password1=Input::get('password');

        if(DB::table('users')->select('user_id','password')->where('user_id','=',$username1)->where('password','=',$password1)->get())
        {

//die("OK");
            return view ('admin/demo');
        }

        else
        {
            return "Access denied";
        }
    }


    //Author
    public function authorSignUp()
    {

        $input['name']= Input::get('name');
        $input['user_id']= Input::get('user_id');
        $input['password']= Input::get('password');
        $input['user_typ']= "author";
        users::create($input);
        return redirect('AuthorsList');

    }


   /* public function author_signup_page()
    {

        return view ('author/author_signup');
    }
*/
    /*public function create_author()
    {
        $input['name']= Input::get('name');
        $input['user_id']= Input::get('user_id');
        $input['password']= Input::get('password');
        $input['user_typ']= "author";
        users::create($input);
        return redirect('author_signup');
    }*/

    public function author_login_page()
    {
        return view ('author/author_login');
    }

    public function author_login_authentication()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if(DB::table('users')->where('user_id','=',$username)->where('password','=',$password)->where('user_typ','=',"author")->get())
        {
            return view('author/author_page');
        }

        else
        {
            return "fail";
        }
    }

    public function showAuthorsList()
    {
        $catgories = DB::table('users')->where('user_typ',"author")->get();
        return view('author/AuthorsList', array("data"=>$catgories));
    }



    public function getAuthorRecord($id)

    {

        $user=DB::table('users')->where('id',$id)->get();
        return view('author/EditAuthor', array("data"=>$user));
    }


    public function update_author_record($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'user_id'=> Input::get('roll_no'),
                    'password'=> Input::get('password')]

            );
        return redirect('show_author_list');
    }

    public function deleteAuthorRecord($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('AuthorsList');
    }


//student

    public function addAuthor()
    {
        return view('author/AddAuthor');
    }

    public function student_signup_page()
    {

        return view ('student/student_signup');
    }
    public function create_student()
    {
        $input['name'] = Input::get('name');
        $input['roll_no'] = Input::get('roll_no');
        $input['user_id'] = Input::get('roll_no');
        $input['password'] = Input::get('password');
        $input['user_typ'] = "student";
        users::create($input);
        return "student created";
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('get_student_list');
    }

    public function show_student_list()
    {
        $users = DB::table('users')->where('user_typ',"student")->get();
        return view('student/student', array("data"=>$users));
    }
    /*public function show_student_list1()
    {
        $users = DB::table('users')->where('user_typ',"student")->get();
        return view('student/show_student_record_for_updation', array("data"=>$users));
    }*/

    public function get_student_record($id)

    {
        $student=DB::table('users')->where('id',$id)->get();
        return view('student/Edit_student_page' , array("data"=>$student));
    }

    public function update_student_record($id)
    {

        DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'roll_No'=> Input::get('roll_no'),
                    'user_id'=> Input::get('roll_no'),
                    'password'=> Input::get('password')]
            );

        return redirect('get_student_list');

    }

    public function demoLayout(){
       // die("acha ggggg");
        return view('admin.demo' , array());
    }


    public function addStudent(){

        return view('student/addStudent');
    }
    public function editStudent(){

        return view('student/editStudent');
    }
    public function addCategory(){

        return view('categories/addCategory');
    }




}
