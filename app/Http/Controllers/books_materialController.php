<?php namespace App\Http\Controllers;

use App\categories;
use App\books;
use App\pages;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\View;

class books_materialController extends Controller
{


    public function index()
    {

        return view('categories/categories_page');
    }


    public function Add_category()
    {
        $input['category_name'] = Input::get('category_name');
        // $input['category_name1']=Input::post('category_name');
        categories::create($input);
        return "category created";
    }
//edting of category
    public function get_category_list()
    {
        $category = DB::table('categories')->get();
        return view('categories/show_category_record_for_updation', array("data" => $category));
    }

    public function delete_category($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return "student deleted";
    }


    public function get_category_record($id)

    {
        $category = DB::table('categories')->where('id', $id)->get();

        //return View::make('student/Edit_student_page')->with(array('name' =>$student->name, 'roll_no' => $student->Roll_No));

        return view('categories/edit_category_page', array("data" => $category));
    }

    public function update_category_record($id)
    {
        // die($id);

        DB::table('categories')
            ->where('id', $id)
            ->update(

            //->update(['votes' => 1]);
                ['category_name' => Input::get('category_name'),]
            );
        return redirect('get_category_list');

        //return redirect('student/get_student_record/17');

    }


    //books addtion

    public function show_category_list()
    {
        $category = DB::table('categories')->get();
        return view('books/add_book', array("data" => $category));
    }


    public function add_book()
    {
        $input['title'] = Input::get('title');
        $input['description'] = Input::get('description');
        $input['category_id'] =Input::get('category_id');
        books::create($input);
        //var_dump($input) ;
        return redirect('add_book');
    }

    public function get_books_list()
    {
        $books = DB::table('books')->get();
        return view('author/show_book_record_for_updation', array("data" => $books));
    }


    public function delete_book($id)
    {
        DB::table('books')->where('id',$id)->delete();
        return redirect('get_books_list');
    }


    public function get_book_record($id)

    {
        $category=DB::table('books')->where('id',$id)->get();

        //return View::make('student/Edit_student_page')->with(array('name' =>$student->name, 'roll_no' => $student->Roll_No));

        return view('categories/edit_category_page' , array("data"=>$category));
    }

  /*  public function update_category_record($id)
    {
        // die($id);

        DB::table('categories')
            ->where('id', $id)
            ->update(

            //->update(['votes' => 1]);
                ['category_name'=> Input::get('category_name'),]
            );
        return redirect ('get_category_list');

        //return redirect('student/get_student_record/17');

    }

    public function get_category_list()
    {
        $category = DB::table('categories')->get();
        return view('categories/show_category_record_for_updation', array("data"=>$category));
    }

    public function delete_category($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return "student deleted";
    }


    public function get_category_record($id)

    {
        $category=DB::table('categories')->where('id',$id)->get();

        //return View::make('student/Edit_student_page')->with(array('name' =>$student->name, 'roll_no' => $student->Roll_No));

        return view('categories/edit_category_page' , array("data"=>$category));
    }

    public function update_category_record($id)
    {
        // die($id);

        DB::table('categories')
            ->where('id', $id)
            ->update(

            //->update(['votes' => 1]);
                ['category_name'=> Input::get('category_name'),]
            );
        return redirect ('get_category_list');

        //return redirect('student/get_student_record/17');

    }

    public function get_category_list()
    {
        $category = DB::table('categories')->get();
        return view('categories/show_category_record_for_updation', array("data"=>$category));
    }

    public function delete_category($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return "student deleted";
    }


    public function get_category_record($id)

    {
        $category=DB::table('categories')->where('id',$id)->get();

        //return View::make('student/Edit_student_page')->with(array('name' =>$student->name, 'roll_no' => $student->Roll_No));

        return view('categories/edit_category_page' , array("data"=>$category));
    }

    public function update_category_record($id)
    {
        // die($id);

        DB::table('categories')
            ->where('id', $id)
            ->update(

            //->update(['votes' => 1]);
                ['category_name'=> Input::get('category_name'),]
            );
        return redirect ('get_category_list');

        //return redirect('student/get_student_record/17');

    }*/

    public function add_page($id)
    {
        $books = DB::table('books')->where('id',$id)->get();
        return view('books/add_page', array("data" => $books));
       // return view('books/add_page');

    }

    public function show_books_list()
    {
        $books = DB::table('books')->get();
        return view('books/show_book_record_for_page_insertion', array("data" => $books));
    }

    public function books_page()
    {
        return view('author/books_page');

    }

    public function save_page($id)
    {


        if (Input::hasFile('filename'))
        {
            $destinationPath = public_path().'\storage\public\pages';
            $input['bg']=Input::file('filename')->move($destinationPath,uniqid ("page"));
            $input['book_id']=$id;
            pages::create($input);
            return redirect('add_page/'.$id);
        }
        else
        {
            return "file not slected";
        }

    }



}
