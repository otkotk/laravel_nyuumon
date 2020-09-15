@extends('layouts.helloapp')
<style>
    .pagination{font-size: 10pt;}
    .pagination li{display: inline-block;}
    tr th a:link{color: white;}
    tr th a:visited{color: white;}
    tr th a:hover{color: white;}
    tr th a:active{color: white;}
</style>

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
@if (Auth::check())
    <p>USER: {{ $user->name . '(' . $user->email . ')' . "PASSWORD" . $user->password }}</p>
@else
    <p>※ログインしていません。( <a href="/login">ログイン</a> | <a href="/register">登録</a> )</p>
@endif
    <table>
        <tr>
            <th><a href="/hello?sort=name">Name</a></th>
            <th><a href="/hello?sort=mail">Mail</a></th>
            <th><a href="/hello?sort=age">Age</a></th>
        </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mail}}</td>
                    <td>{{$item->age}}</td>
                </tr>
            @endforeach
    </table>
    {{-- {{$items->links()}} --}}
    {{ $items->appends(["sort" => $sort])->links() }}
{{-- <p>{{$msg}}</p>
@if (count($errors) > 0)
    <p>入力に問題があります。再入力してください。</p>
@endif
<form action="/hello" method="post">
    <table>
        @csrf
        @if ($errors->has('msg'))
            <tr>
                <th>ERROR</th>
                <td>{{$errors->first('msg')}}</td>
            </tr>
        @endif
        <tr>
            <th>Message: </th>
            <td><input type="text" name="msg" id="" value="{{old('msg')}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
</form> --}}

{{-- <form action="/hello" method="post">
    <table>
        @csrf
        @error('name')
            <tr>
                <th>ERROR</th>
                <td>{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>name: </th>
            <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        @error('mail')
            <tr>
                <th>ERROR</th>
                <td>{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td>
        </tr>
        @error('age')
            <tr>
                <th>ERROR</th>
                <td>{{$message}}</td>
            </tr>
        @enderror
        <tr>
            <th>age: </th><td><input type="text" name="age" value="{{old('age')}}"></td>
        </tr>
        <tr>
            <th></th><td><input type="submit" value="send"></td>
        </tr>
    </table>
</form> --}}

{{-- <p>ここが本文のコンテンツです。</p>
<p>これは、<middleware>google.com</middleware>へのリンクです。</p>
<p>これは、<middleware>yahoo.co.hp</middleware>へのリンクです。</p> --}}

{{-- <table>
    @foreach($data as $item)
    <tr>
        <th>{{$item['name']}}</th>
        <td>{{$item['mail']}}</td>
            </tr>
        @endforeach
    </table> --}}

    {{-- <p>Controller value<br>'message' = {{$message}}</p>
    <p>ViewComposer value<br>'view_message' = {{$view_message}}</p> --}}

    {{-- <ul>
        @each('components.item', $data, 'item')
    </ul> --}}
    {{-- <p>必要なだけ記述できます。</p> --}}

    {{-- @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            これはメッセージの表示です。
        @endslot
    @endcomponent --}}

    {{-- @include('components.message', ['msg_title'=>'OK', 'msg_content'=>'サブビューです。']) --}}

@endsection

@section('footer')
copyright 2020 ota.
@endsection