<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(){
        $data = ["one", "two", "three", "four", "five"];
        return view("hello.index", ["data"=>$data]);
    }
    // @foreachの例 start
    // public function index(){
    //     return view('hello.index', ['msg'=>'']);
    // }

    // public function post(Request $request){
    //     return view('hello.index', ['msg'=>$request->message]);
    // }
    // @foreachの例 end


    // public function index(Request $request, Response $response){
    //     $req_url = $request->url();
    //     $req_fullUrl = $request->fullUrl();
    //     $req_path = $request->path();
    //     $html = <<<EOF
    //     <html>
    //     <head>
    //         <title>Hello/Index</title>
    //         <style>
    //         body{
    //             font-size: 16pt;
    //             color: #999;
    //         }
    //         h1{
    //             font-size: 120pt;
    //             text-align: right;
    //             color: #fafafa;
    //             margin: -50px 0 -120px 0;
    //         }
    //         </style>
    //     </head>
    //     <body>
    //         <h1>Hello</h1>
    //         <h3>Request</h3>
    //         <pre>{$request}</pre>
    //         <pre>$req_url</pre>
    //         <pre>$req_fullUrl</pre>
    //         <pre>$req_path</pre>
    //         <h3>Response</h3>
    //         <pre>{$response}</pre>
    //         <pre>$req_path</pre>
    //     </body>
    //     </html>
    //     EOF;

    //     $response->setContent($html);
    //     return $response;
    // }
}

// global $head, $style, $body, $end;

// $head = '<html><head>';
// $style = <<<EOF
//     <style>
//         body { font-size:16pt; color:#999; }
//         h1 { font-size:100pt; text-align:right; color:#eee;
//             margin:-40 0 -50px 0; }
//     </style>
//     EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt){
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }

// class HelloController extends Controller
// {
//     public function __invoke()
//     {
//         return <<<EOF
//         <html>
//         <head>
//             <title>Hello</title>
//             <style>
//                 body {
//                     font-size:16pt; color:#999;
//                 }
//                 h1 {
//                     font-size:30pt;
//                     text-align:right;
//                     color:#eee;
//                     margin:-15px 0 0 0;
//                 }
//             </style>
//         <body>
//             <h1>Single Action</h1>
//             <p>これは、シングルアクションコントローラーのアクションでし。</p>
//         </body>
//         </head>
//         </html>
//         EOF;
//     }

//     // public function index(){
//     //     global $head, $style, $body, $end;

//     //     $html = $head . tag('title', 'Hello/Index') . $style .
//     //         $body
//     //         . tag('h1', 'Index') . tag('p', 'I have a pen')
//     //         . '<a href="/hello/other">go to Other page</a>'
//     //         . $end;
//     //     return $html;
//     // }

//     // public function other(){
//     //     global $head, $style, $body, $end;
//     //     $html = $head . tag('title', 'Hello/Other') . $style .
//     //         $body
//     //         . tag('h1', 'Other') . tag('p', 'I have an apple')
//     //         . $end;
//     //     return $html;
//     // }
// }
