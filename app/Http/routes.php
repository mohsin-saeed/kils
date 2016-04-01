<?php

//admin
Route::get('/', 'usersController@index');
Route::get ('admin_creation_confirmation', 'usersController@admin_creation');
Route::post ('admin_authentication', 'usersController@admin_authentication');
Route::get ('admin_page', 'usersController@index');

//author
//Route::get ('author_page', 'authorController@author_page');
Route::get ('AuthorsList', 'usersController@showAuthorsList');

//Route::get ('author_signup', 'usersController@author_signup_page');
//Route::post ('create_author', 'usersController@create_author');
//Route::get ('author_login', 'usersController@author_login_page');
//Route::post ('author_login_authentication', 'usersController@author_login_authentication');
////Route::get ('show_author_list', 'usersController@show_author_list');
//Route::post ('remove_author/id', 'usersController@remove_author');
Route::get('EditAuthorRecord/{id}','usersController@getAuthorRecord');
Route::get('getAuthorRecord/{id}','usersController@getAuthorRecord');
Route::post('update_author_record/{id}','usersController@update_author_record');
Route::get('deleteAuthorRecord/{id}','usersController@deleteAuthorRecord');
//Route::get ('page', 'books_materialController@page');
Route::get('AddAuthor','usersController@addAuthor');
Route::post('authorSignUp','usersController@authorSignUp');
//Route::get('EditAuthor','usersController@authorSignUp');


//student
Route::get ('students', 'usersController@show_student_list');

Route::get ('student_signup', 'usersController@student_signup_page');
Route::post ('create_student', 'usersController@create_student');
Route::get('get_student_list','usersController@show_student_list');
Route::get('get_student_record/{id}','usersController@get_student_record');
Route::get('delete_student/{id}','usersController@delete');
Route::get('update_student_record/{id}','usersController@update_student_record');

//categories

Route::get('categories','books_materialController@get_category_list');
Route::get('categories_page','books_materialController@index');

Route::post('Add_category','books_materialController@Add_category');
Route::get('get_category_list','books_materialController@get_category_list');
Route::get('category/delete/{id}','books_materialController@delete_category');
Route::get('category/get_category_record/{id}','books_materialController@get_category_record');
Route::get('update_category_record/{id}','books_materialController@update_category_record');

//books
Route::get('show_category_list','books_materialController@show_category_list');
Route::get('add_book','books_materialController@show_category_list');


Route::get('books_page','books_materialController@books_page');
Route::get('save_book','books_materialController@add_book');
Route::get('get_books_list','books_materialController@get_books_list');
Route::get('book/delete/{id}','books_materialController@delete_book');
Route::get('get_book_record/{id}','books_materialController@get_book_record');
Route::get('update_book_record/{id}','books_materialController@update_book_record');

//pages
Route::get('show_books_list','books_materialController@show_books_list');
Route::get('add_page/{id}','books_materialController@add_page');
Route::post('save_page/{id}','books_materialController@save_page');

//objects
//Route::get('','books_materialController@show_books_list');







Route::get('layout','usersController@demoLayout');

Route::get('addStudent','usersController@addStudent');
Route::get('editstudent','usersController@editStudent');
Route::get('addCategory','usersController@addCategory');

?>