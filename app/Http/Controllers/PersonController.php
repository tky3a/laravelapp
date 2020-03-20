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
    $input_val = $request->input;
    $item = Person::find($input_val);
    return view('person.find', ['input' => $input_val, 'id' => $request->id, 'item' => $item]);
  }
}
