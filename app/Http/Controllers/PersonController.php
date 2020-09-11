<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request){
        $hasItems = Person::has("boards")->get();
        $noItems = Person::doesntHave("boards")->get();
        $param = ["hasItems" => $hasItems, "noItems" => $noItems];
        return view("person.index", $param);
        // $person = new Person();
        // $items = $person::all();
        // return view("person.index", ["items" => $items]);
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

    public function add(Request $request)
    {
        return view("person.add");
    }

    public function create(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form["_token"]);
        $person->fill($form)->save();
        // 下記とやってることは同じ。
        // $person->name = $request->name;
        // $person->mail = $request->mail;
        // $person->age = $request->age;
        // $person->save();
        return redirect("/person");
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view("person.edit", ["form" => $person]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form["_token"]);
        $person->fill($form)->save();
        return redirect("/person");
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);
        return view("person.del", ["form" => $person]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect("/person");
    }
}
