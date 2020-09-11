@extends('layouts.helloapp')

@section('title', 'Person.Delete')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <form action="/person/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>name: </th>
            <td><input type="text" name="name" id="" value="{{$form->name}}"></td>
        </tr>
        <tr>
            <th>mail: </th>
            <td><input type="text" name="mail" id="" value="{{$form->mail}}"></td>
        </tr>
        <tr>
            <th>age: </th>
            <td><input type="number" name="age" id="" value="{{$form->age}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="delete"></td>
        </tr>
    </table>
    </form>
@endsection

@section('footer')
    copyright 2020 ora,
@endsection