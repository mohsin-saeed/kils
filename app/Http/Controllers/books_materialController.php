<?php namespace App\Http\Controllers;

use App\categories;
use App\books;
use App\pages;
use App\objects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\View;

class books_materialController extends Controller
{
    public function addCategory()
    {
       return view ('categories/AddCategory');
    }

    public function createCategory()
    {
        $input['category_name'] = Input::get('name');
        categories::create($input);
        return redirect('Categories');
    }

    public function getCategoryRecord($id)
    {
        $category = DB::table('categories')->where('id', $id)->get();
        return view('categories/editCategory', array("data" => $category));
    }

    public function showCategoryList()
    {
        $category = DB::table('categories')->get();
        return view('categories/categories', array("data" => $category));
    }

    public function saveCategoryEdition($id)
    {
        DB::table('categories')->where('id', $id)->update(['category_name' => Input::get('name'),]);
        return redirect('Categories');
    }

    public function deleteCategory($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect('Categories');
    }


    //books addtion

    public function showBooksList()
    {
        $books = DB::table('books')->get();
        return view('books/Books', array("data" => $books));
    }

    public function addBook()
    {
        $category = DB::table('categories')->get();
        return view('books/AddBook', array("data" => $category));

    }

    public function createBook()
    {
        $input['title'] = Input::get('title');
        $input['description'] = Input::get('description');
        $input['category_id'] =Input::get('category_id');
        books::create($input);
        return redirect('Books');
    }

    public function getBookRecord($id)
    {
        $book=DB::table('books')->where('id',$id)->get();
        return view('books/EditBook' , array("data"=>$book));
    }


    public function saveBookEdition($id)
    {
        DB::table('books')
            ->where('id', $id)
            ->update(
                ['title'=> Input::get('title'),
                    'description'=> Input::get('description')]
            );
        return redirect('Books');
    }

    public function deleteBook($id)
    {
        DB::table('books')->where('id',$id)->delete();
        return redirect('Books');
    }



//pagess//////////////////


    public function addPage($id)
    {
        $books = DB::table('books')->where('id',$id)->get();
        return view('books/AddPage',array("data"=>$books));
    }

    public function getBookName($id)
    {
        $Book = DB::table('Books')->where('book_id',$id)->get();
        return view('books/AddBook',array("data"=>$Book));

    }
    public function showBookPages($id)
    {
        $Book = DB::table('pages')->where('book_id',$id)->get();
        return view('books/Pages',array("data"=>$Book));

    }

    public function savePage($id)
    {
        if (Input::hasFile('filename'))
        {
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'\storage\public\pages';
            $name = uniqid ("page", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
            $input['bg']= $name.".".$extension;
            $input['book_id']=$id;
            pages::create($input);
            return redirect('Pages/'.$id);
        }
        else
        {
            return "file not slected";
        }

    }


    public function editPage($id)
    {

        $page=DB::table('pages')->where('id',$id)->get();
        return view('books/EditPage' , array("data"=>$page));
    }

    public function savePageEdition($id)
    {
        if (Input::hasFile('filename'))
        {


            //delete file from folder
           $data=DB::table('pages')->where('id',$id)->get();
           $folderpath="D:/xampp/htdocs/project/public/storage/public/pages/";
            $path=$folderpath.$data[0]->bg;
            unlink($path);

            //replace file onserver
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
           $extension = $fileTokens[count($fileTokens) - 1];
           $destinationPath = public_path().'\storage\public\pages';
           $name = uniqid ("page", true);
           Input::file('filename')->move($destinationPath,$name.".".$extension);
           DB::table('pages')
               ->where('id', $id)
               ->update(['bg'=> $name.".".$extension]);
            $bookid =DB::table('pages')->where('id',$id)->get();
            return redirect('Pages/'.$bookid[0]->book_id);

        }

        else
        {
            return "file not slected";
        }
    }

    public function deletePage($id)
    {
        //delete file from folder
        $data=DB::table('pages')->where('id',$id)->get();
        $folderpath="D:/xampp/htdocs/project/public/storage/public/pages/";
        $path=$folderpath.$data[0]->bg;
        unlink($path);
        //removing from db
        DB::table('pages')->where('id',$id)->delete();
        return redirect('Pages/'.$data[0]->book_id);

    }


//objectsssssssssssssssssssssssssss

    public function showPageObject($id)
    {
        $objects = DB::table('objects')->where('page_id',$id)->get();
        return view('books/Object', array("data" => $objects));
    }
    public function addPageObject($id)
    {
        $page = DB::table('pages')->where('id',$id)->get();
        return view('books/AddObject', array("data" => $page));
    }
    public function savePageObject($id)
    {
        if (Input::hasFile('filename'))
        {
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'\storage\public\objects';
            $name = uniqid ("page", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
            $input['object_path']=$name.".".$extension;;
            $input['page_id']=$id;
            objects::create($input);
            return redirect('Objects/'.$id);
        }
        else
        {
            return "file not slected";
        }
    }


    public function editObject($id)
    {

        $object=DB::table('objects')->where('id',$id)->get();
        return view('books/EditObject' , array("data"=>$object));
    }


    public function saveObjectEdition($id)
    {
        if (Input::hasFile('filename'))
        {

            //delete file from folder
            $data=DB::table('objects')->where('id',$id)->get();
            $folderpath="D:/xampp/htdocs/project/public/storage/public/objects/";
            $path=$folderpath.$data[0]->object_path;
            unlink($path);

            //replace in db
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'\storage\public\objects';
            $name = uniqid ("object", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
             DB::table('objects')
                ->where('id', $id)
                ->update(['object_path'=> $name.".".$extension]);
            $objectid =DB::table('objects')->where('id',$id)->get();
            return redirect('Objects/'.$objectid[0]->page_id);

        }

        else
        {
            return "file not slected";
        }
    }

    public function deleteObject($id)
    {
        //delete file from folder
        $data=DB::table('objects')->where('id',$id)->get();
        $folderpath="D:/xampp/htdocs/project/public/storage/public/objects/";
        $path=$folderpath.$data[0]->object_path;
        unlink($path);
        //removing from db
        DB::table('objects')->where('id',$id)->delete();
        return redirect('Objects/'.$data[0]->page_id);

    }



    //test

    public function showPageObjecttest($id)
    {
        $objects = DB::table('objects')->where('page_id',$id)->get();
        return view('books/test',array("data" => $objects));
    }

}
