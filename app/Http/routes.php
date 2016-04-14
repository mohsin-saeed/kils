<?php
//layout
Route::get('layout','usersController@demoLayout');


//admin
Route::get('/', 'usersController@index');
Route::get ('admin_creation_confirmation', 'usersController@admin_creation');
Route::post ('admin_authentication', 'usersController@admin_authentication');
Route::get ('admin_page', 'usersController@index');


//author
Route::get('AuthorsList','usersController@showAuthorsList');
Route::get('AddAuthor','usersController@addAuthor');
Route::post('authorSignUp','usersController@authorSignUp');
Route::get('EditAuthorRecord/{id}','usersController@getAuthorRecord');
Route::post('updateAuthorRecord/{id}','usersController@saveAuthorEdition');
Route::get('deleteAuthorRecord/{id}','usersController@deleteAuthorRecord');
Route::get('AuthorLogin', 'usersController@returnAuthorLoginPage');
Route::post ('IsAuthor', 'usersController@isAuthor');
Route::get ('Author', 'usersController@returnAuthorPage');


//student
Route::get ('students', 'usersController@showStudentList');
Route::get ('AddStudent', 'usersController@addStudent');
Route::get ('StudentSignUp', 'usersController@studentSignUp');
Route::get('EditStudent/{id}','usersController@getStudentRecord');
Route::get('EditStudent','usersController@getStudentRecord1');
Route::get('DeleteStudent/{id}','usersController@deleteStudent');
Route::post('updateStudentRecord/{id}','usersController@saveStudentEdition');


//categories
Route::get('Categories','books_materialController@showCategoryList');
Route::get('AddCategory','books_materialController@addCategory');
Route::get('createCategory','books_materialController@createCategory');
Route::get('EditCategory/{id}','books_materialController@getCategoryRecord');
Route::get('UpdateCategoryRecord/{id}','books_materialController@saveCategoryEdition');
Route::get('deleteCategoryRecord/{id}','books_materialController@deleteCategory');

//books
Route::get('Books','books_materialController@showBooksList');
Route::get('AddBook','books_materialController@addBook');
Route::get('GetBookName/{id}','books_materialController@getBookName');
Route::get('CreateBook','books_materialController@createBook');
Route::get('DeleteBookRecord/{id}','books_materialController@deleteBook');
Route::get('EditBookRecord/{id}','books_materialController@getBookRecord');
Route::get('updateBookRecord/{id}','books_materialController@saveBookEdition');


//pages
Route::get('Pages/{id}','books_materialController@showBookPages');
Route::get('AddPage/{id}','books_materialController@addPage');
Route::post('SavePage/{id}','books_materialController@savePage');
Route::get('EditPageRecord/{id}','books_materialController@editPage');
Route::post('UpdatePageRecord/{id}','books_materialController@savePageEdition');
Route::get('DeletePageRecord/{id}','books_materialController@deletePage');


//objects
Route::get('Objects/{id}','books_materialController@showPageObject');
Route::get('AddObject/{id}','books_materialController@addPageObject');
Route::post('SavePageObject/{id}','books_materialController@savePageObject');
Route::get('EditObjectRecord/{id}','books_materialController@editObject');
Route::post('UpdateObjectRecord/{id}','books_materialController@saveObjectEdition');
Route::get('DeleteObjectRecord/{id}','books_materialController@deleteObject');



//test

Route::get('test/{id}','books_materialController@showPageObjecttest');
?>