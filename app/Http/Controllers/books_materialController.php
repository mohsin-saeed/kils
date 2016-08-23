<?php namespace App\Http\Controllers;

use App\categories;
use App\books;
use App\pages;
use App\objects;
use App\states;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\View;
class testit{
    public $page_id = -1;
}
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
        $data = DB::table('pages')->where('book_id',$id)->get();
        $data["book_id"] = $id;
        return view('books/Pages',array("data"=>$data));

    }

    public function savePage($id)
    {
        if (Input::hasFile('filename'))
        {
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'/storage/public/pages';
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
            $destinationPath2 = public_path().'\storage\public\objectsbg';
            $name = uniqid ("page", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
          //  Input::file('filename')->move($destinationPath2,$name.".".$extension);
            $input['object_path']=$name.".".$extension;
            $input['page_id']=$id;
           copy ($destinationPath."\\".$name.".".$extension,$destinationPath2."\\".$name.".".$extension);
            objects::create($input);
            $lastrow =DB::table('objects')->where('page_id',$id)->orderBy('Id', 'desc')->first();
            $input['object_id']=$lastrow->id;
            $input['bg']=$name.".".$extension;
            $input['width']=15;
            $input['height']=8;
            $input['x']=0;
            $input['y']=0;
            $input['action']="Rotate";
            states::create($input);
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
        if(!isset($objects[0])){

            $objects[0] = new testit();

            $objects[0]->page_id = $id;
        }
        return view('books/test',array("data" => $objects));
    }
    public function test()
    {
        return view('books/ ');
    }

    public function testfun($p)
    {

     //$a=Input::all();
     $b=Input::get('field1');
     //$c=$a;
    //print_r($b);
        //die;
     return($p." --- aaaa");
    //echo $a;
    }

    public function saveState()
    {
        //die(Input::all());
        $lastrow =DB::table('states')->orderBy('Id', 'desc')->first();
        if($lastrow==null)
        {
            $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'\storage\public\objectsbg';
            $name = uniqid ("page", true);
            Input::file('logo')->move($destinationPath,$name.".".$extension);
            $input['bg']=$name.".".$extension;

            $inputs=Input::all();
            $input['object_id']=$inputs['obj_id'];
            $input['x']=$inputs['x'];
            $input['y']=$inputs['y'];
            $input['width']=$inputs['width'];
            $input['height']=$inputs['height'];
            $input['action']=$inputs['action'];
            $input['delay']=$inputs['delay'];
            $input['duration']=$inputs['duration'];
            states::create($input);


        }
        else
        {

            if (Input::file('logo'))
            {
                $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
                $extension = $fileTokens[count($fileTokens) - 1];
                $destinationPath = public_path().'\storage\public\objectsbg';
                $name = uniqid ("page", true);
                Input::file('logo')->move($destinationPath,$name.".".$extension);
                $input['bg']=$name.".".$extension;
                $id= $lastrow->Id;

                DB::table('states')
                    ->where('Id', $id)
                    ->update(['next_state'=>$id+1]);

                $inputs=Input::all();
                $input['object_id']=$inputs['obj_id'];
                $input['x']=$inputs['x'];
                $input['y']=$inputs['y'];
                $input['width']=$inputs['width'];
                $input['height']=$inputs['height'];
                $input['action']=$inputs['action'];
                $input['delay']=$inputs['delay'];
                $input['duration']=$inputs['duration'];
                states::create($input);



            }
            else
            {
                return "file not slected";
            }


         }


    }
    public function getObjectStates()
    {
        $data=DB::table('states')->where('object_id',Input::get('id'))->get();
        return($data);
    }
    public function getState()
    {
         return $state=DB::table('states')->where('id',Input::get('id'))->get();
    }
    public function deleteState()
    {
         return $status=DB::table('states')->where('id',Input::get('id'))->delete();
    }


    public function previewPage($page_id){
        $data =DB::select("SELECT * FROM objects



        WHERE page_id = ".$page_id."

        ORDER BY objects.id");

        foreach($data as &$obj){
            $states = DB::select("SELECT * FROM `states`
            WHERE object_id = ".$obj->id."
            ORDER BY states.id");
            $obj->states=$states;
        }
        $json_data =  json_encode($data);
//        echo "<pre>";
//        var_dump($data);
//        echo "</pre><br><br> JSON HERE <br><br><pre>";
//        var_dump( json_encode($json_data));

        $data["raw_data"] = $data;
        $data["json_data"] = $json_data;

        return view('books/page_preview', $data);
    }



    public function editState()
    {
            //$lastrow =DB::table('states')->orderBy('Id', 'desc')->first();
            /*$fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'\storage\public\objectsbg';
            $name = uniqid ("page", true);
            Input::file('logo')->move($destinationPath,$name.".".$extension);
            $input['bg']=$name.".".$extension;*/



            //die("jdkjsdkshdkjshdkjshdkjsdkjd");
        //return  ("hhhhh");
            $inputs=Input::all();
        return($inputs['x']);
        DB::table('states')
                ->where('Id',$inputs['id'])
                ->update([
                        'x'=>$inputs['x'],
                        'y'=>$inputs['y'],
                        'width'=>$inputs['width'],
                        'height'=>$inputs['height'],
                        'action'=>$inputs['action'],
                        'delay'=>$inputs['delay'],
                        'duration'=>$inputs['duration']]);
                        //states::create($input);




          /*  if (Input::file('logo'))
            {
                $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
                $extension = $fileTokens[count($fileTokens) - 1];
                $destinationPath = public_path().'\storage\public\objectsbg';
                $name = uniqid ("page", true);
                Input::file('logo')->move($destinationPath,$name.".".$extension);
                $input['bg']=$name.".".$extension;
                $id= $lastrow->Id;

                DB::table('states')
                    ->where('Id', $id)
                    ->update(['next_state'=>$id+1]);

                $inputs=Input::all();
                $input['object_id']=$inputs['obj_id'];
                $input['x']=$inputs['x'];
                $input['y']=$inputs['y'];
                $input['width']=$inputs['width'];
                $input['height']=$inputs['height'];
                $input['action']=$inputs['action'];
                $input['delay']=$inputs['delay'];
                $input['duration']=$inputs['duration'];
                states::create($input);
            }
            else
            {
                return "file not slected";
            }*/





    }
}
