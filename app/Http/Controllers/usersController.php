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
            return view ('admin/demo');
        }

        else
        {
            return "Access denied";
        }
    }


    //Author

    public function addAuthor()
    {
        return view('author/AddAuthor');
    }

    public function authorSignUp()
    {
        $input['name']= Input::get('name');
        $input['user_id']= Input::get('user_id');
        $input['password']= Input::get('password');
        $input['user_typ']= "author";
        users::create($input);
        return redirect('AuthorsList');
    }

    public function returnAuthorLoginPage()
    {
        return view('author/AuthorLogin');
    }

    public function isAuthor()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if(DB::table('users')->where('user_id','=',$username)->where('password','=',$password)->where('user_typ','=',"author")->get())
        {
            return view('author/Author');
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

    public function saveAuthorEdition($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'user_id'=> Input::get('userid'),
                    'password'=> Input::get('password')]

            );
        return redirect('AuthorsList');
    }

    public function deleteAuthorRecord($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('AuthorsList');
    }


//student

    public function addStudent()
    {
        return view('Student/AddStudent');
    }

    public function studentSignUp()
    {
        $input['name'] = Input::get('name');
        $input['roll_no'] = Input::get('rollnumber');
        $input['user_id'] = Input::get('rollnumber');
        $input['password'] = "123";
        $input['user_typ'] = "student";
        users::create($input);
        return redirect('students');
    }

    public function deleteStudent($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('students');
    }

    public function showStudentList()
    {
        $users = DB::table('users')->where('user_typ',"student")->get();
        return view('student/students', array("data"=>$users));
    }

    public function getStudentRecord1()

    {
        return view('student/EditStudent' );
    }

    public function test($id)

    {
        return view('student/es' );
    }

    public function getStudentRecord($id)

    {
        $student=DB::table('users')->where('id',$id)->get();
        return view('student/EditStudent' , array("data"=>$student));
    }

    public function saveStudentEdition($id)
    {

        DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'roll_no'=> Input::get('rollno'),
                    'user_id'=> Input::get('rollno'),
                    'password'=> Input::get('password')]
            );

        return redirect('students');

    }

    public function editStudent(){

        return view('student/editStudent');
    }


}
