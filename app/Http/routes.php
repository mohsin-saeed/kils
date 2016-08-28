<?php
//layout
Route::get('layout', 'usersController@demoLayout');

Route::group(['middleware' => 'auth'], function () {


//admin
    Route::get('/', 'usersController@index');
    Route::get('logout', 'usersController@index');
    Route::get('admin_creation_confirmation', 'usersController@admin_creation');
    Route::get('home', 'books_materialController@showCategoryList');

    Route::post('authentication', 'usersController@authentication');
    Route::get('admin_page', 'usersController@index');

//author
    Route::get('AuthorsList', 'usersController@showAuthorsList');
    Route::get('AddAuthor', 'usersController@addAuthor');
    Route::post('authorSignUp', 'usersController@authorSignUp');
    Route::get('EditAuthorRecord/{id}', 'usersController@getAuthorRecord');
    Route::post('updateAuthorRecord/{id}', 'usersController@saveAuthorEdition');
    Route::get('deleteAuthorRecord/{id}', 'usersController@deleteAuthorRecord');
    Route::get('AuthorLogin', 'usersController@returnAuthorLoginPage');
    Route::post('IsAuthor', 'usersController@isAuthor');
    Route::get('Author', 'usersController@returnAuthorPage');

//student
    Route::get('students', 'usersController@showStudentList');
    Route::get('AddStudent', 'usersController@addStudent');
    Route::get('StudentSignUp', 'usersController@studentSignUp');
    Route::get('EditStudent/{id}', 'usersController@getStudentRecord');
    Route::get('EditStudent', 'usersController@getStudentRecord1');
    Route::get('DeleteStudent/{id}', 'usersController@deleteStudent');
    Route::post('updateStudentRecord/{id}', 'usersController@saveStudentEdition');

//categories
    Route::get('Categories', 'books_materialController@showCategoryList');
    Route::get('AddCategory', 'books_materialController@addCategory');
    Route::get('createCategory', 'books_materialController@createCategory');
    Route::get('EditCategory/{id}', 'books_materialController@getCategoryRecord');
    Route::get('UpdateCategoryRecord/{id}', 'books_materialController@saveCategoryEdition');
    Route::get('deleteCategoryRecord/{id}', 'books_materialController@deleteCategory');

//books
    Route::get('Books', 'books_materialController@showBooksList');
    Route::get('AddBook', 'books_materialController@addBook');
    Route::get('GetBookName/{id}', 'books_materialController@getBookName');
    Route::get('CreateBook', 'books_materialController@createBook');
    Route::get('DeleteBookRecord/{id}', 'books_materialController@deleteBook');
    Route::get('EditBookRecord/{id}', 'books_materialController@getBookRecord');
    Route::get('updateBookRecord/{id}', 'books_materialController@saveBookEdition');

//pages
    Route::get('Pages/{id}', 'books_materialController@showBookPages');
    Route::get('AddPage/{id}', 'books_materialController@addPage');
    Route::post('SavePage/{id}', 'books_materialController@savePage');
    Route::get('EditPageRecord/{id}', 'books_materialController@editPage');
    Route::get('CustomisePageRecord/{id}', 'books_materialController@customisePage');
    Route::get('EditPageObject/{id}', 'books_materialController@showPageState');
    Route::get('ObjectStateDetail/{id}', 'books_materialController@showObjectStateDetail');
    Route::get('DeletePageObject/{id}', 'books_materialController@deletePageObject');
    Route::get('DeleteObjectStateDetail/{id}', 'books_materialController@deleteObjectStateDetail');
    Route::post('SaveObjectStateDetailChange', 'books_materialController@saveObjectStateDetailChange');
    Route::post('UpdatePageRecord/{id}', 'books_materialController@savePageEdition');
    Route::get('DeletePageRecord/{id}', 'books_materialController@deletePage');

//objects
    Route::get('Objects/{id}', 'books_materialController@showPageObject');
    Route::get('AddObject/{id}', 'books_materialController@addPageObject');
    Route::post('SavePageObject/{id}', 'books_materialController@savePageObject');
    Route::get('EditObjectRecord/{id}', 'books_materialController@editObject');
    Route::post('UpdateObjectRecord/{id}', 'books_materialController@saveObjectEdition');
    Route::get('DeleteObjectRecord/{id}', 'books_materialController@deleteObject');

//test

    Route::get('test/{id}', 'books_materialController@showPageObjecttest');
    Route::get('test2', 'books_materialController@test');
    Route::post('saveState', 'books_materialController@saveState');
    Route::get('getObjectStates', 'books_materialController@getObjectStates');
    Route::get('getState', 'books_materialController@getState');
    Route::get('deleteState', 'books_materialController@deleteState');
    Route::get('preview/{page_id}', 'books_materialController@previewPage');
    Route::post('editState', 'books_materialController@editState');
    Route::get('test1', function () {
        return view("test1");
    });

    Route::get('package/{bookId}', 'PackagerController@package');
});
Route::get('authenticateStudent', 'authenticateStudent');

Route::get('api/categories', 'ApiController@categories');

Route::get('api/books', 'ApiController@books');




Route::get('download/{filename}', function ($filename) {
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() . '/' . $filename;
    if (file_exists($file_path)) {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: ' . filesize($file_path)
        ]);
    } else {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
    ->where('filename', '[A-Za-z0-9\-\_\.]+');


Route::get('downloadBook/{bookId}', function ($bookId) {
    // Check if file exists in app/storage/file folder
    // public/books/ready/book_22/book.zip
    $file_path = storage_path() . '/public/books/ready/book_' . $bookId . '/book.zip';
    if (file_exists($file_path)) {
        // Send Download
        return Response::download($file_path, 'book_' . $bookId . ".zip", [
            'Content-Length: ' . filesize($file_path)
        ]);
    } else {
        // Error
        exit('Requested file does not exist on our server!');
    }
})
    ->where('filename', '[A-Za-z0-9\-\_\.]+');


//Route::get('test','books_materialController@testfun' );
/*{
    if(Request::ajax()){
        return '{ "messageCount":31, "inviteCount":32, "friendCount":33}';
    }

});*/

/*
require "connection.php";

$mysql_qry = "select * from books";

$result = mysqli_query($conn ,$mysql_qry);
$response=array();

while($row=mysqli_fetch_array($result)){
    array_push($response,array("title"=>$row[0]));
}
echo json_encode(array("sever_response"=>$response));
mysqli_close($conn);*/

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'api'], function () {
    Route::post('login', 'ApiController@login');
    Route::post('register', 'ApiController@register');
})

?>
