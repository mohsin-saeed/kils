<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\student;
use App\categories;
use App\books;
use ZipArchive;
use RecursiveIteratorIterator;
//use Hash;
use App\Questions;
use App\Quiz;
use Input;
use Validator;

use Illuminate\Support\Facades\View;

class questionController extends Controller
{


    public function index()
    {

        $question = Questions::all()->sortByDesc("id");

        return view('question/adminindex', array("question"=>$question));

    }
    public function adminIndex()
    {

        $question = Questions::all()->sortByDesc("id");

        return view('question/adminindex', array("question"=>$question));

    }

    public function add()
    {

    $quiz = Quiz::
    lists('title', 'id');


        return view('question/add', array("quiz"=>$quiz));

    }


    public function create()
    {
        $rules = array(
            'title' => 'required',
            'quiz_id' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'is_correct' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            //$messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }else{

        $abc =Questions::create([
            'title' => Input::get('title'),
            'quiz_id' => Input::get('quiz_id'),
            'option_a' => Input::get('option_a'),
            'option_b' => Input::get('option_b'),
            'option_c' => Input::get('option_c'),
            'option_d' => Input::get('option_d'),
            'is_correct' => Input::get('is_correct'),

        ]);

        }
        return redirect('question');


    }

    public function edit($id)
    {

        $question = Questions::find($id);


        $quiz = Quiz::lists('title', 'id');
        return view('question/edit', array("quiz"=>$quiz,"question"=>$question));

    }

    public function update($id)
    {

      $id=$id;

        $rules = array(
            'title' => 'required',
            'quiz_id' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'is_correct' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            //$messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }
        else{



            DB::table('questions')->where('id', $id)->update([
                'title' => Input::get('title'),
                'quiz_id' => Input::get('quiz_id'),
                'option_a' => Input::get('option_a'),
                'option_b' => Input::get('option_b'),
                'option_c' => Input::get('option_c'),
                'option_d' => Input::get('option_d'),
                'is_correct' => Input::get('is_correct'),

            ]);
            return redirect('question');
         }

    }

    public function delete($id)
    {
        $questions = Questions::find($id);
        $questions->delete($id);

    }

    public function view($id)
    {
        $questions = Questions::find($id);

        return view('question/view', array("questions"=>$questions));

    }

}
