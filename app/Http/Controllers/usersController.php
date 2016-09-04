<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Validator;


class usersController extends Controller
{

    public function index()
    {

        //{{ $php_errormsg->first('username'); }};



        return view('auth/login');
    }

    public function create_admin()
    {
        $input['user_id']= Input::get('username');
        $input['password']= Input::get('password');
        users::create($input);
    }

    public function authentication()
    {
        $username1=Input::get('username');
        $password1=Input::get('password');
        $usertype=Input::get('rolechoice');


        if($usertype=="admin")
        {
            if (DB::table('users')->select('user_id', 'password')->where('user_id', '=', $username1)->where('password', '=', $password1)->where('user_typ', '=',"admin")->get())
            {
                return view('admin/admin');
            }
            else
            {
             /* //  session()->flash('alert-success', 'User was successful added!');
                $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
                return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));*/

               // return redirect("/");

                /*Session::flash('key', 'Invalid User Id Or Password');
                return view('admin/login')->with('message', 'Login Failed');*/
            }
        }
        else
        {
            if (DB::table('users')->select('user_id', 'password')->where('user_id', '=', $username1)->where('password', '=', $password1)->where('user_typ', '=',"author")->get())
            {
                return view('author/Author');
            }
            else
            {
               // Session::put('aa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

                return view('admin/login')->with('message', 'Login Failed');


            }

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

    public function getStudent()
    {
        return view('Student/addstudent');
    }

    public function postStudent(Request $request)
    {
        $validator=usersController::validateStudent($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        usersController::createStudent($request->all());

        return redirect('students');

    }
    public function validateStudent(array $data){
        return Validator::make($data, [
            'name' => 'required|Alpha',
            'roll_no'=>'required|size:4|unique:users'

        ]);

    }

    public function createStudent(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'roll_no' => $data['roll_no'],
            'user_typ'=>'student',
            'password'=> bcrypt($data['roll_no'])
        ]);
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


    public function authenticateStudent()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        echo '<script language="javascript">';
        echo 'alert("message successfully sent")';
        echo '</script>';
        if(DB::table('users')->where('user_id','=',$username)->where('password','=',$password)->where('user_typ','=',"student")->get())
        {
            return true;
        }

        else
        {
            return "false";
        }
    }


}
