<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request){
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()){
            $msg = 'クエリーに問題があります。';
        }else{
            $msg = 'ID/PASSを受け付けました。フォームを入力して下さい。';
        }
        return view('hello.index', ['msg'=>$msg, ]);
    }

    public function post(Request $request){
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力してください。',
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入してください。',
            'age.min' => '年齢はゼロ歳以上で記入してください。',
            'age.max' => '年齢は200歳以下で記入してください。',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        $validator->sometimes('age', 'min:0', function($input){
            return is_numeric($input->age);
        });

        $validator->sometimes('age', 'max:200', function($input){
            return is_numeric($input->age);
        });
        if($validator->fails()){
            return redirect('/hello')
            ->withErrors($validator)
            ->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }

    // public function post(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',
    //     ]);
    //     if($validator->fails()){
    //         return redirect('/hello')
    //         ->withErrors($validator)
    //         ->withInput();
    //     }
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    // public function post(HelloRequest $request){
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    // public function post(Request $request){
    //     $validate_rule = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',
    //     ];
    //     $this->validate($request, $validate_rule);
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    // public function index(Request $request){
    //     return view('hello.index');
    // }

    // public function index(Request $request){
    //     return view('hello.index', ['data'=>$request->data]);
    // }
    
    // public function index(){
    //     return view('hello.index', ['message'=>'Hello!']);
    // }

    // public function index(){
    //     $data = [
    //         ["name"=>"山田たろう", "mail"=>"taro@yamada"],
    //         ["name"=>"田中はなこ", "mail"=>"hanako@flower"],
    //         ["name"=>"鈴木さちこ", "mail"=>"sachiko@happy"]
    //     ];

    //     return view('hello.index', ['data'=>$data]);
    // }

    // public function index(){
    //     $data = ["one", "two", "three", "four", "five"];
    //     return view("hello.index", ["data"=>$data]);
    // }

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
