@extends('layout.helloapp')

@section('title', "Person.Add")

@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/person/add" method="post">
    <table>
        @csrf
        <tr>
            <th>name: </th>
            <td><input type="text" name="name" id="" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>mail: </th>
            <td><input type="text" name="mail" id="" value="{{old('mail')}}"></td>
        </tr>
        <tr>
            <th>age: </th>
            <td><input type="number" name="age" id="" value="{{old('age')}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="submit"></td>
        </tr>
    </table>
    </form>
@endsection

@section('footer')
    copyright 2020 ota.
@endsection