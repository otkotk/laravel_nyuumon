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

Route::get('/', function () {
    return view('welcome');
});

// $html = <<<EOF
// <html>
// <head>
//     <title>HELLO.</title>
//     <style>
//         body{font-size:16pt; color:#999;}
//         h1{font-size:100pt; text-align:right; color:#eee; margin:-40px 0 -50px 0px;}
//     </style>
// </head>
// <body>
//     <h1>HELLOOO.lol</h1>
//     <p>I have a pen.</p>
//     <p>I have a apple...</p>
//     <p>アッポーペン</p>
// </body>
// </html>
// EOF;

// Route::get('hello/{msg?}', function($msg='?'){
//     $html = <<<EOF
//     <html>
//     <head>
//         <title>HELLO.^^/</title>
//         <style>
//             body{ font-size:16pt; color:#999; }
//             h1{ font-size:100pt; text-align:right; color:#eee; margin:-40px 0 -50px 0; }
//         </style>
//     </head>
//     <body>
//         <h1>HELLO</h1>
//         <p>hello/? 「?」に入力した値がここに出ます ☞ {$msg}</p>
//         <p>これは、Route::get() の中に書いてます。</p>
//     </body>
//     </html>
// EOF;
//     return $html;
// });

// Route::get('hello/{id?}/{pass?}', 'HelloController@index');

// Route::get('hello', 'HelloController@index');
// Route::get('hello/other', 'HelloController@other');
// Route::get('hello', 'HelloController');
// Route::get('hello', 'HelloController@index');

// Route::get('hello', function(){
//     return view('hello.index');
// });

Route::get('hello', 'HelloController@index');
Route::post('hello', 'HelloController@post');