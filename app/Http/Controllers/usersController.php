<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use Hash;
use Redirect;
class usersController extends Controller
{

    public function index()
    {
        return view('auth/login');
    }

    public function create_admin()
    {
        $input['user_id']= Input::get('username');
        $input['password']= Input::get('password');
        users::create($input);
    }

/*    public function authentication()
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
                return view('admin/login')->with('message', 'Login Failed');
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


    }*/
    //Author
    public function addAuthor()
    {
        return view('author/AddAuthor');
    }

    public function authorSignUp(Request $request)
    {

        $validator=usersController::validateAuthor($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        usersController::createAuthor($request->all());

        return redirect('AuthorsList');

    }

    public function validateAuthor(array $data){
        return Validator::make($data, [
            'name' => 'required',
            'email'=>'required|unique:users',
            'password' => 'required|min:6',
            'confirmpassword' => 'required|same:password'


        ]);

    }

    public function createAuthor(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_typ'=>'author',
            'password'=> bcrypt($data['password'])
        ]);
    }

   /* public function returnAuthorLoginPage()
    {
        return view('author/AuthorLogin');
    }*/

    /*public function isAuthor()
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
    }*/


    public function showAuthorsList()
    {
        $catgories = DB::table('users')->where('user_typ',"author")->get();
        return view('author/AuthorsList', array("data"=>$catgories));
    }

    public function getAuthorRecord($id)
    {
        $user=DB::table('users')->where('id',$id)->first();
        return view('author/EditAuthor', array("data"=>$user));
    }

    public function saveAuthorEdition(Request $request, $id)
    {

        $validator=usersController::validateEditAuthor($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        usersController::saveAuthorEdition2($request->all(),$id);

        return redirect('AuthorsList');

        /*DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'user_id'=> Input::get('userid'),
                    'password'=> Input::get('password')]
            );*/

        return redirect('AuthorsList');
    }

    public function validateEditAuthor(array $data){

        return Validator::make($data, [
            'name' => 'required',
            'email'=>'required',
            'newpassword' => 'required|min:6',
            'confirmpassword' => 'required|same:newpassword'
        ]);
    }

    public function saveAuthorEdition2(array $data,$id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['name'=> Input::get('name'),
                    'email'=> Input::get('email'),
                    'password'=> Input::get('newpassword')]

            );
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


    public function forgetpassword()
    {

        //{{ $php_errormsg->first('username'); }};

        return view('admin/forgetpassword');
    }


    public function send_mail()
    {
        $rules = array(
            'email' =>  'required|email',
         );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
            $user_email=Input::get('email');
            $user_data=User::where('email',$user_email) -> first();
           // var_dump($user_data->email);exit;
            if($user_data) {
                $data['verification_code'] = str_random(20);
                DB::table('users')->where('id', $user_data->id)->update([
                    'password_rest_token' => $data['verification_code']
                ]);
                Mail::send('emails.welcome', $data, function ($message) use ($data) {
                    $message->from('kinnect2.com@gmail.com', "Site name");
                    $message->subject("Reset password");
                    $message->to('amjad.sarwar23@gmail.com');
                });
                Session::flash('success', 'Please check yor email!');
                return redirect('auth/login');

            }else{
                Session::flash('error', 'Email not match!');

                return Redirect::back();

            }
        }

    }
    public function verify($token)
    {

        $user_data=User::where('password_rest_token',$token) -> first();
        if($user_data) {
            return view('admin/reset', array("user_data" => $user_data));
        }else{
            Session::flash('error', 'Token not match!');
            return redirect('auth/login');
        }

    }

    public function change_password($id)
    {

        $rules = array(

              'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }else {
            $pass=Input::get('password');
            $password = Hash::make($pass);
            $user_data = User::where('id', $id)->first();

            DB::table('users')->where('id', $user_data->id)->update([
                'password' => $password,
                'password_rest_token' => "",
         ]);

            return redirect('auth/login');
        }

    }


}
