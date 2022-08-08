<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\MailsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use Illuminate\Support\Facades\Route;

// use, namespace


// Route::get(url, action);
// Route::post(url, action);
// Route::put(url, action);
// Route::patch(url, action);
// Route::delete(url, action);

// Route::get('/', function() {
//     return 'Homepage';
// });

// Route::get('about', function() {
//     return 'About Page get';
// });

// Route::post('about', function() {
//     return 'About Page post';
// });

// Route::put('about', function() {
//     return 'About Page put';
// });

// Route::delete('about', function() {
//     return 'About Page delete';
// });

// Route::get('welcome/{name}/age/{age}', function($name, $age) {
//     return 'Welcome ' . $name .', your age is ' . $age;
// })->whereAlpha('name')->whereNumber('age');


// Route::get('news', function() {
//     return 'News';
// });

// Route::get('news/{id?}', function($id = null) {
//     return 'News ' .$id;
// });




// Route::get('/', function() {
//     // return url('contact');
//     // return route('contactpage');

//     $name = 'ali';
//     $id = 5;
//     $id2 = 9;

//     // return url('users/' . $name . '/posts/' . $id . '/comment/' . $id2);
//     return route('comments', [$name, $id, $id2]);
//     // return url('/');
// });

// Route::get('contact-gfgfgfgfgfgfgfgfg', function() {
//     return 'contact';
// })->name('contactpage');

// Route::get('users/{name}/posts/{id}/comments/{id2}/show', function($name, $id, $id2) {
//     return "$name | $id | $id2";
// })->name('comments');

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/contact', [MainController::class, 'contact'])->name('contact');


Route::get('/site1', [Site1Controller::class, 'index'])->name('site1');

Route::prefix('site2')->name('site2.')->group(function() {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about-us', [Site2Controller::class, 'about'])->name('about');
    Route::get('/contact-me', [Site2Controller::class, 'contact'])->name('contact');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
});

Route::prefix('site3')->name('site3.')->group(function() {
    Route::get('/', [Site3Controller::class, 'about'])->name('about');
    Route::get('/experiance', [Site3Controller::class, 'experiance'])->name('experiance');
    Route::get('/education', [Site3Controller::class, 'education'])->name('education');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');
});

Route::get('form1', [FormsController::class, 'form1'])->name('form1');
Route::post('form1', [FormsController::class, 'form1_data']);

Route::get('form2', [FormsController::class, 'form2'])->name('form2');
Route::post('form2', [FormsController::class, 'form2_data'])->name('form2_data');

Route::get('form3', [FormsController::class, 'form3'])->name('form3');
Route::post('form3', [FormsController::class, 'form3_data'])->name('form3_data');

Route::get('form4', [FormsController::class, 'form4'])->name('form4');
Route::post('form4', [FormsController::class, 'form4_data'])->name('form4_data');

Route::get('form5', [FormsController::class, 'form5'])->name('form5');
Route::post('form5', [FormsController::class, 'form5_data'])->name('form5_data');

Route::get('send-mail', [MailsController::class, 'send_mail']);

Route::get('contact-us', [MailsController::class, 'contact_us'])->name('contact_us');
Route::post('contact-us', [MailsController::class, 'contact_us_data'])->name('contact_us_data');


/*

CRUD
C => Create
R => Read
U => Update
D => Delete

*/

// Route::get('posts', [Postcontroller::class, 'index'])->name('posts.index');

// Route::get('posts/create', [Postcontroller::class, 'create'])->name('posts.create');
// Route::post('posts/create', [Postcontroller::class, 'store'])->name('posts.store');

// Route::delete('posts/{id}/destroy', [Postcontroller::class, 'destroy'])->name('posts.destroy');

// Route::get('posts/{id}/edit', [Postcontroller::class, 'edit'])->name('posts.edit');
// Route::put('posts/{id}/update', [Postcontroller::class, 'update'])->name('posts.update');

Route::get('posts/trash', [Postcontroller::class, 'trash'])->name('posts.trash');
Route::get('posts/{id}/restore', [Postcontroller::class, 'restore'])->name('posts.restore');
Route::delete('posts/{id}/delete', [Postcontroller::class, 'delete'])->name('posts.delete');
Route::resource('posts', Postcontroller::class);

Route::resource('categories', CategoryController::class);

Route::get('one-to-one', [RelationController::class, 'one_to_one'])->name('one_to_one');

Route::get('one-to-many', [RelationController::class, 'one_to_many'])->name('one_to_many');
Route::post('one-to-many', [RelationController::class, 'one_to_many_data'])->name('one_to_many_data');

Route::get('many-to-many', [RelationController::class, 'many_to_many'])->name('many_to_many');
Route::post('many-to-many', [RelationController::class, 'many_to_many_data'])->name('many_to_many_data');


Route::get('new-mail', [MailsController::class, 'new_mail']);

Route::get('/custom-posts', [MainController::class, 'custom_posts'])->name('custom_posts');
