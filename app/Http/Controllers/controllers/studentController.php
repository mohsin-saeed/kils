<?php namespace App\Http\Controllers;
/*
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\student;
//use Hash;

use Illuminate\Support\Facades\View;

class studentController extends Controller
{



    public function index()
    {

        return view ('student/student_signup');
    }
    public function create_student()
    {
        $input['name'] = Input::get('name');
        $input['Roll_No'] = Input::get('roll_no');
        $input['username'] = Input::get('roll_no');
        $input['password'] = Input::get('password');
        //var_dump($input);exit;

        student::create($input);
        return "student created";
    }

    public function edit($id)
    {
        die($id);
    }

    public function delete($id)
    {
        DB::table('student')->where('id',$id)->delete();
    }

    public function show_student_list()
    {
        $student = DB::table('student')->get();
        return view('student/show_student_record_for_updation', array("data"=>$student));
    }

    public function get_student_record($id)

    {
         $student=DB::table('student')->where('id',$id)->get();

        //return View::make('student/Edit_student_page')->with(array('name' =>$student->name, 'roll_no' => $student->Roll_No));

        return view('student/Edit_student_page' , array("data"=>$student));
    }

    public function update_student_record($id)
    {
       // die($id);

        DB::table('student')
            ->where('id', $id)
            ->update(

            //->update(['votes' => 1]);
                        ['Name'=> Input::get('name'),
                        'Roll_No'=> Input::get('roll_no'),
                        'username'=> Input::get('roll_no'),
                        'password'=> Input::get('password')]
                    );

        //return redirect('student/get_student_record/17');

    }

}*/
