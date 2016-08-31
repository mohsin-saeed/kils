<?php namespace App\Http\Controllers;

use App\categories;
use App\books;
use App\pages;
use App\objects;
use App\states;
use App\Videos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
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
        //return view('books/Books', array("data" => $books));
        return view('books/Books1', array("data" => $books));
    }

    public function addBook()
    {
        $category = DB::table('categories')->get();
        return view('books/AddBook', array("data" => $category));

    }

    public function saveBook(Request $request)
    {
        $book_obj=new Books();
        $validator=$book_obj->validateBook($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $input['title'] = Input::get('title');
        $input['description'] = Input::get('description');
        $input['category_id'] =Input::get('category_id');
        books::create($input);
        return redirect('Books');
    }

    public function getBookRecord($id)
    {
        $book=DB::table('books')->where('id',$id)->first();
        return view('books/EditBook' , array("data"=>$book));
    }

    public function saveBookEdition(Request $request,$id)
    {

        $book_obj=new Books();
        $validator=$book_obj->validateEditBook($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

        DB::table('books')
            ->where('id',$id)
            ->update([
                    'title'=> Input::get('title'),
                    'description'=> Input::get('description'),
                    'category_id'=>Input::get('category_id'),
                    ]);
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
        //$data['pages'] = DB::table('pages')->where('book_id',$id)->get();
        $data['pages'] = DB::table('pages')->where('book_id',$id)->first();
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


    public function customisePage($id)
    {

        /* $page=DB::table('pages')->where('id',$id)->get();
         return view('books/EditPage' , array("data"=>$page));*/
        $objects=DB::table('objects')->where('page_id',$id)->get();
        return view('books/BookPageListing' , array("data"=>$objects));
    }


    public function showPageState($id)
    {
        $states=DB::table('states')->where('object_id',$id)->get();


        return view('books/EditPageObject' , array("data"=>$states));
    }
    public function showObjectStateDetail($id)
    {
        $states=DB::table('states')->where('Id',$id)->get();

        $object=DB::table('objects')->where('Id',$states[0]->object_id)->get();

        $page=DB::table('pages')->where('Id',$object[0]->page_id)->get();
        $states["page"] = $page[0];
        //echo "<pre>";
        //var_dump($states);
        //var_dump($object);

        //var_dump($page);
        return view('books/ObjectStateDetail' , array("data"=>$states));
    }
    public function deletePageObject($id)
    {
        $objectdir="D:/xampp/htdocs/project/public/storage/public/objects/";
        $statedir="D:/xampp/htdocs/project/public/storage/public/objects/";
        $data=DB::table('objects')->where('id',$id)->get();
        $path=$data[0]->object_path;
        $page_id=$data[0]->page_id;
        $object_id=$data[0]->id;
        $statedata=DB::table('states')->where('object_id',$object_id)->get();

        foreach($statedata as $statedata)
        {
            $statedatatodelete=DB::table('states')->where('Id',$statedata->Id)->get();
            unlink($statedir.$statedatatodelete[0]->bg);
            DB::table('states')->where('Id',$statedata->Id)->delete();

        }
        DB::table('objects')->where('id',$id)->delete();
        unlink($objectdir.$path);
        $objects=DB::table('objects')->where('page_id',$page_id)->get();
        return view('books/BookPageListing',array("data"=>$objects));
    }
    public function deleteObjectStateDetail($id)
    {
        $statedir="D:/xampp/htdocs/project/public/storage/public/objects/";
        $data=DB::table('states')->where('Id',$id)->get();

        unlink($statedir.$data[0]->bg);
        DB::table('states')->where('Id',$id)->delete();
        $data=DB::table('states')->where('object_id',$data[0]->object_id)->get();

        return view('books/EditPageObject',array("data"=>$data));
    }

    public function saveObjectStateDetailChange()
    {



        if (Input::hasFile('filename'))
        {
            //delete file from folder
            $id=$_POST["id"];
            $x=$_POST["x"];
            $y=$_POST["y"];
            $delay=$_POST["delay"];
            $duration=$_POST["duration"];
            $action=$_POST["action"];
            $data=DB::table('states')->where('id',$id)->get();
            $statesdir="D:/xampp/htdocs/project/public/storage/public/objects/";
            $path=$statesdir.$data[0]->bg;
            unlink($path);
            //replace file onserver
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'/storage/public/objects';
            $name = uniqid ("page", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
            DB::table('states')
                ->where('id', $id)
                ->update([
                    'x'=>$x,
                    'y'=> $y,
                    'duration'=> $duration,
                    'delay'=> $delay,
                    'action'=> $action,
                    'bg'=> $name.".".$extension
                ]);




            $data =DB::table('states')->where('id',$id)->get();
            return view('books/ObjectStateDetail',array("data"=>$data));

        }

        else
        {
            return "file not slected";
        }
        $data=$_POST["category"];
        echo $data;
    }


    public function savePageEdition($id)
    {
        if (Input::hasFile('filename'))
        {


            //delete file from folder
           $data=DB::table('pages')->where('id',$id)->get();
           $folderpath= public_path()."/storage/public/pages/";
            $path=$folderpath.$data[0]->bg;
            unlink($path);

            //replace file onserver
            $fileTokens = explode(".",Input::file('filename')->getClientOriginalName());
           $extension = $fileTokens[count($fileTokens) - 1];
           $destinationPath = public_path().'/storage/public/pages';
           $name = uniqid ("page", true);
           Input::file('filename')->move($destinationPath,$name.".".$extension);
           DB::table('pages')
               ->where('id', $id)
               ->update(['bg'=> $name.".".$extension]);
            $bookid =DB::table('pages')->where('id',$id)->get();


        }

        if(Input::hasFile('audio')){
            $data=DB::table('pages')->where('id',$id)->get();
            $folderpath=public_path()."/storage/public/pages/";
            $path=$folderpath.$data[0]->audio;
            if(file_exists($path)){
                //unlink($path);
            }


            //replace file onserver
            $fileTokens = explode(".",Input::file('audio')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'/storage/public/pages';
            $name = uniqid ("audio-".$id."-", true);
            Input::file('audio')->move($destinationPath,$name.".".$extension);
            DB::table('pages')
                ->where('id', $id)
                ->update(['audio'=> $name.".".$extension]);
            $bookid =DB::table('pages')->where('id',$id)->get();
        }

        if(Input::hasFile('filename') || Input::hasFile('audio')){
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
            $destinationPath = public_path().'/storage/public/objects';
            $destinationPath2 = public_path().'/storage/public/objects';
            $name = uniqid ("page", true);
            Input::file('filename')->move($destinationPath,$name.".".$extension);
          //  Input::file('filename')->move($destinationPath2,$name.".".$extension);
            $input['object_path']=$name.".".$extension;
            $input['page_id']=$id;
           copy ($destinationPath."/".$name.".".$extension,$destinationPath2."/".$name.".".$extension);

            $imageDimensions = getimagesize($destinationPath2."/".$name.".".$extension);
            objects::create($input);
            $lastrow =DB::table('objects')->where('page_id',$id)->orderBy('Id', 'desc')->first();
            $input['object_id']=$lastrow->id;
            $input['bg']=$name.".".$extension;
            $input['width']=$imageDimensions[0];
            $input['height']=$imageDimensions[1];
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
        //$lastrow =DB::table('states')->orderBy('Id', 'desc')->first();
        $inputs=Input::all();
        if(empty($inputs['duration']) || $inputs['duration'] < 1){
            $inputs['duration'] = 1000;
        }

        if(empty($inputs['degree'])){
            $inputs['degree'] = 0;
        }

        $previousState = DB::table('states')->where("object_id", $inputs['obj_id'])->orderBy('Id', 'desc')->first();
        if($previousState==null)
        {
            $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'/storage/public/objects';
            $name = uniqid ("page", true);
            Input::file('logo')->move($destinationPath,$name.".".$extension);
            $imageDimensions = getimagesize($destinationPath."/".$name.".".$extension);
            $input['bg']=$name.".".$extension;

            $input['object_id']=$inputs['obj_id'];
            $input['x']=$inputs['x'];
            $input['y']=$inputs['y'];
            $input['degree']=$inputs['degree'];
            $input['width']=$imageDimensions[0];//$inputs['width'];
            $input['height']=$imageDimensions[1];//$inputs['height'];
            $input['action']=$inputs['action'];
            $input['delay']=$inputs['delay'];
            $input['duration']= $inputs['duration'];
            states::create($input);
        }
        else
        {
            if (Input::file('logo'))
            {
                $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
                $extension = $fileTokens[count($fileTokens) - 1];
                $destinationPath = public_path().'/storage/public/objects';
                $name = uniqid ("page", true);
                Input::file('logo')->move($destinationPath,$name.".".$extension);
                $imageDimensions = getimagesize($destinationPath."/".$name.".".$extension);
                $input['bg']=$name.".".$extension;
                $input['width']=$imageDimensions[0];
                $input['height']=$imageDimensions[1];

            }
            else
            {

                $input['bg']=$previousState->bg;
                $input['object_id']=$inputs['obj_id'];
                $input['width']= $previousState->width;
                $input['height']= $previousState->height;

            }

            $input['degree']=$inputs['degree'];
            $input['object_id']=$inputs['obj_id'];
            $input['x']=$inputs['x'];
            $input['y']=$inputs['y'];
            //$input['width']=$inputs['width'];
            //$input['height']=$inputs['height'];
            $input['action']=$inputs['action'];
            $input['delay']=$inputs['delay'];
            $input['duration']=$inputs['duration'];
            //states::create($input);

            $newId= DB::table('states')->insertGetId($input);

            $id= $previousState->Id;
            DB::table('states')
                ->where('Id', $id)
                ->update(['next_state'=>$newId]);

            return 1;

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

        $page = DB::select("SELECT * FROM pages WHERE  id =".$page_id);
        foreach($data as &$obj){
            $states = DB::select("SELECT * FROM `states`
            WHERE object_id = ".$obj->id."
            ORDER BY states.id");
            $obj->states=$states;
        }
        $json_data =  json_encode($data);
        $page[0]->bgUrl = url('/storage/public/pages/'.$page[0]->bg);
        $data["raw_data"] = $data;
        $data["json_data"] = $json_data;
        $data["page"] = $page;
        $data["baseUrl"] = url('');

        return view('books/page_preview', $data);
    }



    public function editState()
    {



        $inputs=Input::all();
        $state[0] = DB::table('states')
            ->where('Id',$inputs['id'])->first();
        DB::table('states')
                ->where('Id',$inputs['id'])
                ->update([
                        'x'=>$inputs['x'],
                        'y'=>$inputs['y'],
                        'degree'=>$inputs['degree'],
                        //'width'=>$inputs['width'],
                        //'height'=>$inputs['height'],
                        'action'=>$inputs['action'],
                        'delay'=>$inputs['delay'],
                        'duration'=>$inputs['duration']

                    ]
                );

        if (Input::file('logo'))
        {
            //echo "in";
            $fileTokens = explode(".",Input::file('logo')->getClientOriginalName());
            $extension = $fileTokens[count($fileTokens) - 1];
            $destinationPath = public_path().'/storage/public/objects';
            $name = uniqid ("page", true);
            Input::file('logo')->move($destinationPath,$name.".".$extension);
            $imageDimensions = getimagesize($destinationPath."/".$name.".".$extension);
            //print_r($imageDimensions);
            $input = [];
            $input['bg']=$name.".".$extension;
            $input['width']=$imageDimensions[0];
            $input['height']=$imageDimensions[1];
            //print_r($input);
            //echo "AND -".$inputs['id'];
            DB::table('states')
                ->where('Id',$inputs['id'])
                ->update($input);

        }

//        if($state[0] && $state[0]->Id){
//            print_r($state[0]->Id);
//            DB::table('states')
//                ->where('next_state',$state[0]->Id)
//                ->update([
//                    'delay'=>$inputs['delay'],
//                    'duration'=>$inputs['duration']]);
//        }


    }
    public function showVideoList(){

        $videos = DB::table('videos')->get();

        return view('videos/videos', array("data" => $videos));



    }
    public function addVideo(){
        return view('videos/addvideo');
    }

    public function saveVideo(Request $request)
    {
        $video_obj=new Videos();
        $validator=$video_obj->validateVideo($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }
        books_materialController::createVideo();

        return redirect('videos');

    }

    public function createVideo(){

        $video_obj=new Videos();
        $input['title']=Input::get('title');
        $input['url']=$url=Input::get('url');
        $input['description']=Input::get('description');
        $input['thumbnail']=$video_obj->tokenize($url);
        Videos::create($input);


    }
    public function deleteVideo($id){

        DB::table('videos')->where('id', $id)->delete();
        return redirect('videos');

    }

    public function editVideo($id){

        $video=DB::table('videos')->where('id',$id)->get();
        return view('videos/editvideo',array("data"=>$video));

    }
    public function saveVideoEdition(Request $request,$id){


        $video_obj=new Videos();
        $validator=$video_obj->validateEditVideo($request->all());

        if ($validator->fails())
        {
            $this->throwValidationException(
                $request, $validator
            );
        }

       //update in db
        DB::table('videos')
            ->where('id', $id)
            ->update([
                'title'=>Input::get('title'),
                'description'=>Input::get('description'),
                'url'=>Input::get('url'),
                'thumbnail'=>$video_obj->tokenize(Input::get('url'))
            ]);
        return redirect('videos');

    }

    public function showVideoDetail($id){

        $datail=DB::table('videos')->where('id',$id)->first();
        return view('videos/detail',array('data'=>$datail));
    }




}
