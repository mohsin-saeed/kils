<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\student;
use App\categories;
use App\books;
use ZipArchive;
use RecursiveIteratorIterator;
//use Hash;
use App\Questions;
use Input;
use Validator;
use App\Quiz;
use App\Result;

use Illuminate\Support\Facades\View;

class quizController extends Controller
{


    public function index()
    {

        $quizzes = Quiz::all()->sortByDesc("id");

        return view('quiz/index', array("quizzes"=>$quizzes));

    }

    public function adminIndex()
    {

        $quizzes = Quiz::all()->sortByDesc("id");

        return view('quiz/adminindex', array("quizzes"=>$quizzes));

    }

    public function add()
    {

    $categories = categories::
    lists('category_name', 'id');


        return view('quiz/add', array("categories"=>$categories));

    }


    public function create()
    {
        $rules = array(
            'title' => 'required',
            'categories_id' => 'required',


        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            //$messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }else{

        $abc =Quiz::create([
            'title' => Input::get('title'),
            'categories_id' => Input::get('categories_id'),


        ]);
            return redirect('quiz');
        }


    }

    public function edit($id)
    {

        $question = Quiz::find($id);


        $categories = categories::lists('category_name', 'id');
        return view('quiz/edit', array("categories"=>$categories,"question"=>$question));

    }

    public function update($id)
    {

      $id=$id;


        $rules = array(
            'title' => 'required',
            'categories_id' => 'required',


        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            //$messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }
        else{



            DB::table('quiz')->where('id', $id)->update([
                'title' => Input::get('title'),
                'categories_id' => Input::get('categories_id'),


            ]);
            return redirect('quiz');
         }

    }

    public function delete($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete($id);

    }

    public function view($id)
    {

        $questions = Quiz::find($id);

        return view('quiz/view', array("questions"=>$questions));

    }

    public function quiz_start($id,$student)
    {
       /* $alreadyTestGiven = array('id'=>"1", 'score' => '60');
        if($alreadyTestGiven){
            return json_encode($alreadyTestGiven);
        }*/
        $quiz_id=$id;
        $student_id=$student;
        $question = Questions::where('quiz_id', '=',$quiz_id)->first();
        $all_question = Questions::where('quiz_id', '=',$quiz_id)->get();
        $count_question=count($all_question);

        $result =Result::create([
            'quiz_id' => $quiz_id,
            'student_id' => $student_id,
            'score' => '0',
            'total_que' =>$count_question,

        ]);



        return view('quiz/start', array("question"=>$question,"student_id"=>$student_id,"result"=>$result));


    }

    public function quiz_submit()
    {
        $quiz_id=$_GET['quiz_id'];
        $question_id=$_GET['question_id'];
        $student_id=$_GET['student_id'];
        $result_id=$_GET['result_id'];


        if(isset($_GET['option']))
        {
            $option=$_GET['option'];
            if($result_id){
                   $question = Questions::where('id', '=',$question_id)->first();


                if($option==$question->is_correct) {

                    $result = Result::find($result_id);
                $result_score=$result->score;
                   $new_score=++$result_score;
                      DB::table('result')->where('id', $result_id)->update([
                        'score' => $new_score,
                      ]);
                }
                $next_question = Questions::where('quiz_id', '=', $quiz_id)->where('id', '>', $question_id)->first();

                if($next_question){

                    $question=array();
                   $question['id']=$next_question->id;
                    $question['title']=$next_question->title;
                    $question['option_a']=$next_question->option_a;
                    $question['option_b']=$next_question->option_b;
                    $question['option_c']=$next_question->option_c;
                    $question['option_d']=$next_question->option_d;

                    echo json_encode($question); exit;
                }else{
                    $question="";
                    echo json_encode($question); exit;
                }





                }
            }

        }







}
