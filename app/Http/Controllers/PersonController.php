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
    // where検索
    // $input_val = $request->input;
    // $item = Person::where('name', $input_val)->first();
    // $params = ['input' => $input_val, 'id' => $request->id, 'item' => $item];
    // return view('person.find', $params);
    $input_val = $request->input;
    $people = Person::all();
    dump($item = Person::NameEqual($input_val)->first());
    $params = ['input' => $input_val, 'id' => $request->id, 'item' => $item];
    return view('person.find', $params);
  }
}
