<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request){
        $person = new Person();
        $items = $person::all();
        return view("person.index", ["items" => $items]);
    }

    public function find(Request $request){
        // Person:: は静的メソッド
        // $items = Person::all();
        return view("person.find", ["input" => ""]);
    }

    public function search(Request $request){
        $person = new Person();
        $min = $request->input * 1;
        $max = $min + 10;
        $item = $person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = ["input" => $request->input, "item" => $item];
        return view("person.find", $param);
        // $item = Person::nameEqual($request->input)->first();
        // $param = ["input" => $request->input, "item" => $item];
        // return view("person.find", $param);
        // $item = Person::where("name", $request->input)->first();
        // $param = ["input" => $request->input, "item" => $item];
        // return view("person.find", $param);
        // $item = Person::find($request->input);
        // $param = ["input" => $request->input, "item" => $item];
        // return view("person.find", $param);
    }
}
