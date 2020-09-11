@extends('layouts.helloapp')

@section('title', "Board.index")

@section('menubar')
    @parent
    ボード・ページ
@endsection

@section('content')
    <table>
        <tr>
            <th>Message</th>
            <th>Name</th>
            <th>person all</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->message}}</td>
                {{-- person(peopleテーブル)に無いデータを使おうとすると、バグる --}}
                <td>{{$item->person->name}}</td>
                <td>{{$item->person}}</td>
            </tr>
        @endforeach
    </table>
@endsection

{{-- @section('content')
    <table>
        <tr>
            <th>Data</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->getData()}}</td>
            </tr>
        @endforeach
    </table>
@endsection --}}

@section('footer')
    copyright 2020 ota.
@endsection