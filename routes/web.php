<?php

use App\Http\Controllers\MainController;
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
