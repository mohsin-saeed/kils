<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\student;
use App\categories;
use App\books;
use ZipArchive;
use RecursiveIteratorIterator;
//use Hash;

use Illuminate\Support\Facades\View;

class PackagerController extends Controller
{

    public function package($bookId){ /// As this function will be called just for few times in a month/year by admin and is doing complex task, its not efficient at this time;

        //die(var_dump(class_exists('RecursiveIteratorIterator')));

        $bookDir = $this->_makeBookDir($bookId);
        if(!$bookDir){
            die("unable to create book dir");
        }

        $pages = $this->_prepare($bookId, $bookDir);

        $res = $this->_prepareWebFiles($pages,$bookDir);

        if($res == true){
            echo "<b>Success</b>";
        }else{
           echo print_r($res);
        }

        $this->zipBookDir($bookDir, 'book');

        print_r($pages);
    }



    public function _prepare($bookId,$bookDir){ // Copy book files and return json meta-data
        echo "<pre>";

        $pages = DB::table('pages')
            ->where('book_id',$bookId)
            ->get();

        $pgNo = 1;
        foreach($pages as &$page){
            $pageObjects = DB::table('objects')
                ->where('page_id',$page->id)
                ->get();
            $page->pageNo = $pgNo++;
            $page->pageId = $page->id;
            $dir = $this->_makePageDir($page, $bookDir);
            $page->dirPath = $dir;
            $page->dirRelPath = 'pages/page_'.$page->pageNo;
            $page->bgRelPath = $page->dirRelPath.'/'.$page->bg;
            $page->objects = $pageObjects;
            foreach($page->objects as &$obj){
                $objectStates = DB::table('states')
                    ->where('object_id',$obj->id)
                    ->get();
                $obj->states = $objectStates;
                foreach($obj->states as &$state){
                    $state->bgPath = $page->dirPath."/".$state->bg;
                    $state->bgRelPath = $page->dirRelPath.'/'.$state->bg;
                    $this->_copyStateFiles($state, $page->dirPath);
                }
            }
        }

        print_r($pages);

        return json_encode($pages);
    }

    public function _prepareWebFiles($pages, $bookDir){
        $script = "var bookPages = ".$pages.";";
        $writtenScript = file_put_contents($bookDir.'/js/book.js', $script);
        $htmlBookFile = $bookDir."/index.html";

        $bookHtml = $this->_getBookHtml($pages);

        $doc = new \DOMDocument();
        $doc->loadHTMLFile($htmlBookFile);
        $body = $doc->getElementsByTagName('body');


        $fragment = $doc->createDocumentFragment();
        $fragment->appendXML($bookHtml);

        $newDiv = $doc->createElement('div');

        foreach ($body as $item) {
            $newDiv = $item->appendChild($newDiv);
        }

        $newDiv->appendChild($fragment);
        $newDiv->setAttribute("class", "book-pages swiper-container");
        $doc->saveHTMLFile($htmlBookFile);


        if(!$writtenScript){
            return "could not create js file";
        }
        if(!$bookHtml){
            return "could not create html file";
        }
        return true;
    }

    public function _getBookHtml($pages){
        $pages = json_decode($pages);
        $html = '<div class="swiper-wrapper">';
        foreach($pages as $page){
            $html .= '<div class="playing-canvas swiper-slide" style="background: url('.$page->bgRelPath.'); background-repeat: no-repeat; background-size:100%">';
            foreach($page->objects as $object){
                if(!empty($object->states[0])){
                    $html .= '<div id="obj-'.$object->id.'" style=" background: url('.$object->states[0]->bgRelPath.'); background-repeat: no-repeat;"></div>';
                }
            }
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }

    public function _prepare1Dumm(){
        $data = [];
        $data = json_encode($data);


        //print($bookHtml);
    }

    public function _makeBookDir($bookId){
        $name = "book_".$bookId;
        $dirPath = storage_path().'/public/books/ready/';
        $dir = $dirPath.$name;
        if(file_exists($dir)){
            rename($dir, $dir."_bk_".rand(1,99));
        }
        mkdir($dir,0777);
        mkdir($dir.'/'.'pages', 0777);
        $this->recurse_copy(public_path().'/book_templates/basic',$dir);
        return $dir;
    }

    public function _makePageDir($page, $bookPath){

        $pageNo = $page->pageNo;

        url('/storage/public/pages/'.$page->bg);

        $dir = $bookPath.'/pages/page_'.$pageNo;
        if(!file_exists($dir)){
            mkdir($dir, 0777);
        }

        $pageSource = public_path('/storage/public/pages/'.$page->bg);
        copy($pageSource, $dir.'/'.$page->bg);
        return $dir;
    }

    public function _copyStateFiles($state, $pageDirPath){
        $bg = $pageDirPath."/".$state->bg;;
        $source = public_path().'/storage/public/objects/'.$state->bg;//'';
        copy($source, $state->bgPath);
    }

    public function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function zipBookDir($dirPath, $name = 'book'){
        $rootPath = $dirPath; //http://stackoverflow.com/questions/4914750/how-to-zip-a-whole-folder-using-php

        // Initialize archive object
        $zip = new \ZipArchive();
        $zip->open($dirPath."/".$name.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file)
        {
            // Skip directories (they would be added automatically)
            if (!$file->isDir())
            {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

        // Zip archive will be created only after closing object
        $zip->close();

    }
}
