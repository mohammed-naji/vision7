<?php

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

Route::get('welcome/{name}/age/{age}', function($name, $age) {
    return 'Welcome ' . $name .', your age is ' . $age;
})->whereAlpha('name')->whereNumber('age');


// Route::get('news', function() {
//     return 'News';
// });

Route::get('news/{id?}', function($id = null) {
    return 'News ' .$id;
});
