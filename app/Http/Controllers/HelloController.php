<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request){
        $items = DB::table("people")->orderBy("age", "asc")->get();
        return view("hello.index", ["items" => $items]);
    }

    // public function index(Request $request){
    //     $items = DB::select('select * from people');
    //     return view('hello.index', ['items' => $items]);
    // }

    public function post(Request $request){
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];
        // DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param);
        DB::table("people")->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request){
        $item = DB::table("people")
            ->where("id", $request->id)->first();
        return view("hello.edit", ["form" => $item]);
        // $param = ["id" => $request->id];
        // $item = DB::select("select * from people where id = :id", $param);
        // return view("hello.edit", ["form" => $item[0]]);
    }

    public function update(Request $request){
        $param = [
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];
        DB::table("people")
            ->where("id", $request->id)
            ->update($param);
        return redirect("/hello");
        // $param = [
        //     "id" => $request->id,
        //     "name" => $request->name,
        //     "mail" => $request->mail,
        //     "age" => $request->age,
        // ];
        // DB::update("update people set name=:name, mail=:mail, age=:age where id=:id", $param);
        // return redirect("/hello");
    }

    public function del(Request $request){
        $item = DB::table("people")
            ->where("id", $request->id)->first();
        return view("hello.del", ["form" => $item]);
        // $param = ["id" => $request->id];
        // $item = DB::select("select * from people where id = :id", $param);
        // return view("hello.del", ["form" => $item[0]]);
    }

    public function remove(Request $request){
        DB::table("people")
            ->where("id", $request->id)->delete();
        return redirect("/hello");
        // $param = ["id" => $request->id];
        // DB::delete("delete from people where id=:id", $param);
        // return redirect("/hello");
    }

    public function show(Request $request){
        $page = $request->page;
        $items = DB::table("people")
            ->offset($page * 3)
            ->limit(3)
            ->get();

        return view("hello.show", ["items" => $items]);
    }

    public function rest(Request $request)
    {
        return view("hello.rest");
    }

    // public function show(Request $request){
    //     $min = $request->min;
    //     $max = $request->max;
    //     $items = DB::table("people")
    //         ->whereRaw("age >= ? and age <= ?", [$min, $max])->get();
        
    //     return view("hello.show", ["items" => $items]);
    // }

    // public function show(Request $request){
    //     $name = $request->name;
    //     $items = DB::table("people")
    //         ->where("name", "like", "%".$name."%")
    //         ->orWhere("mail", "like", "%".$name."%")
    //         ->get();
        
    //     return view("hello.show", ["items" => $items]);
    // }

    // public function show(Request $request){
    //     $id = $request->id;
    //     $items = DB::table("people")->where("id", "<=", $id)->get();
    //     return view("hello.show", ["items" => $items]);
    // }

    // public function index(Request $request){
    //     if(isset($request->id)){
    //         $param = ['id' => $request->id];
    //         $items = DB::select('select * from people where id = :id', $param);
    //     }else{
    //         $items = DB::select('select * from people');
    //     }
    //     return view('hello.index', ['items' => $items]);
    // }

    // public function index(Request $request){
    //     if($request->hasCookie('msg')){
    //         $msg = 'Cookie: ' . $request->cookie('msg');
    //     }else{
    //         $msg = '※クッキーはありません。';
    //     }
    //     return view('hello.index', ['msg'=>$msg]);
    // }

    // public function post(Request $request){
    //     $validate_rule = [
    //         'msg' => 'required',
    //     ];
    //     $this->validate($request, $validate_rule);
    //     $msg = $request->msg;
    //     $response = response()->view('hello.index', ['msg'=>'「' . $msg . '」をクッキーに保存しました。']);
    //     $response->cookie('msg', $msg, 100);
    //     return $response;
    // }

    // public function post(HelloRequest $request){
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

    // public function index(Request $request){
    //     $validator = Validator::make($request->query(), [
    //         'id' => 'required',
    //         'pass' => 'required',
    //     ]);
    //     if($validator->fails()){
    //         $msg = 'クエリーに問題があります。';
    //     }else{
    //         $msg = 'ID/PASSを受け付けました。フォームを入力して下さい。';
    //     }
    //     return view('hello.index', ['msg'=>$msg, ]);
    // }

    // public function post(Request $request){
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric',
    //     ];
    //     $messages = [
    //         'name.required' => '名前は必ず入力してください。',
    //         'mail.email' => 'メールアドレスが必要です。',
    //         'age.numeric' => '年齢を整数で記入してください。',
    //         'age.min' => '年齢はゼロ歳以上で記入してください。',
    //         'age.max' => '年齢は200歳以下で記入してください。',
    //     ];
    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     $validator->sometimes('age', 'min:0', function($input){
    //         return is_numeric($input->age);
    //     });

    //     $validator->sometimes('age', 'max:200', function($input){
    //         return is_numeric($input->age);
    //     });
    //     if($validator->fails()){
    //         return redirect('/hello')
    //         ->withErrors($validator)
    //         ->withInput();
    //     }
    //     return view('hello.index', ['msg'=>'正しく入力されました！']);
    // }

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
