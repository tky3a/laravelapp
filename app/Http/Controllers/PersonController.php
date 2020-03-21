<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

  public function index(){
    $people = Person::all();
    return view('person.index', ['people' => $people]);
  }

  public function find(Request $request){
    return view('person.find', ['input' => '', 'id' => $request->id]);
  }

  public function search(Request $request){
    // where検索サンプル
    // $input_val = $request->input;
    // $item = Person::where('name', $input_val)->first();
    // $params = ['input' => $input_val, 'id' => $request->id, 'item' => $item];
    // return view('person.find', $params);

    // name検索のスコープサンプル
    // $input_val = $request->input;
    // $item = Person::NameEqual($input_val)->first();
    // $params = ['input' => $input_val, 'id' => $request->id, 'item' => $item];
    // return view('person.find', $params);

    $min = $request->input * 1;
    $max = $min + 10;
    // dump($max);
    $items = Person::ageGreaterThan($min)->ageLessThan($max)->get();
    // dump(count($items));
    $params = ['id' => $request->id, 'input' => $request->input, 'items' => $items];
    return view('person.find', $params);
  }
}
