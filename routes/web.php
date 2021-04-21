<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', 'IndexController@HOME');   // Home Page

Route::get('/contactus', 'HelloController@CONTACT')->name('contact');       // Contact
Route::get('/aboutus', 'HelloController@ABOUT')->name('about');             // About

// Category Crud Here...
Route::get('/category/add', 'CategoryController@AddCategory')->name('add_category');    // Add Category
Route::post('category/store', 'CategoryController@StoreCategory')->name('store_category');    // Store Category
Route::get('/category/all', 'CategoryController@AllCategory')->name('all_category');    // Show All Category
Route::get('view/category/{id}', 'CategoryController@ViewCategory');                   // View Single Category
Route::get('edit/category/{id}', 'CategoryController@EditCategory');                   // Edit Category
Route::post('update/category/{id}', 'CategoryController@UpdateCategory');                   // Update Category
Route::get('delete/category/{id}', 'CategoryController@DeleteCategory');                   // Delete Category

// Post Crud Here...
Route::get('/write/newpost', 'PostController@WritePost')->name('write_post');    // Write Post
Route::post('post/store', 'PostController@StorePost')->name('store_post');    // Store Post
Route::get('post/all', 'PostController@AllPost')->name('all_post');    // Show All Post
Route::get('view/post/{id}', 'PostController@ViewPost');    // View Single Post
Route::get('edit/post/{id}', 'PostController@EditPost');    // Edit Post
Route::post('update/post/{id}', 'PostController@UpdatePost');   // Update Post
Route::get('delete/post/{id}', 'PostController@DeletePost');   // Delete Post

// Student Crud Here...
Route::get('students', 'StudentController@create')->name('student');    // Student
Route::post('student/create', 'StudentController@store')->name('store_student');    // Create/Store Student
Route::get('/student/all', 'StudentController@index')->name('all_student');    // Show All Student
Route::get('view/student/{id}', 'StudentController@show');    // View Single Student
Route::get('edit/student/{id}', 'StudentController@EditStudent');    // Edit Student
Route::post('update/student/{id}', 'StudentController@UpdateStudent');   // Update Student
Route::get('delete/student/{id}', 'StudentController@destroy');   // Delete Student

// Route::get('home', function () {
//     echo 'This is a Home Page';
// });

// // Route::get('/about', function() {
// //     return view('about');
// // });

// Route::get('/about', 'HelloController@Manush');

// Route::get('/guru', 'HelloController@Guru');


// LOGIC USE KORI
// Route::get('/contact', function() {
//     echo 'eta contact page';
// })->middleware('age');


// Route::get('/contactus', function () {
//     return view('contact');
// })->name('contact');
