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

  public function add(Request $request)
  {
    var_dump('addアクションです');
    return view('person.add');
  }
  
  public function create(Request $request)
  {
    $this->validate($request, Person::$rules);
    $person = new Person;
    $request_params = $request->all();
    // dd($request_params);
    // $request_params = ['name' => $request->name, 'email' => $request->email, 'age' => $request->age];
    unset($request_params['_token']); #tokenを削除
    $person->fill($request_params)->save();
    return redirect('/person');
  }

  public function edit(Request $request)
  {
    $person = Person::find($request->id);
    return view('person.edit', ['person' => $person]);
  }

  public function update(Request $request)
  {
    $this->validate($request, Person::$rules);
    $person = Person::find($request->id);
    $params = $request->all();
    unset($params['_token']);
    $person->fill($params)->save();
    return redirect('/person');
  }

  public function delete(Request $request)
  {
    Person::find($request->delete_id)->delete();
    return redirect('/person');
  }

}
