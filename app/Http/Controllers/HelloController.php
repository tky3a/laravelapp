<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator; #Validatorメソッドを使う
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
  public function index(Request $request) {
    // dd(['id' => $request->id]);
    // 値が存在している場合
    $items = DB::table('people')->get();
    return view('hello.index', ['items' => $items]);


    // cookieに値を持たせる
    // if ($request->hasCookie('msg'))
    // {
    //   $msg = 'Cookie: ' . $request->cookie('msg');
    // } else {
    //   $msg = '※クッキーはありません';
    // }
    // return view('hello.index', ['msg'=>$msg]);
  }

  public function post(Request $request){
    $validate_rule = [
      'msg' => 'required'
    ];
    $this->validate($request, $validate_rule);
    $msg = $request->msg;
    $response = new Response(view('hello.index', ['msg'=>$msg.'をクッキーに保存しました']));
    $response->cookie('msg', $msg, 100);
    return $response;
  }

  public function add(){
    return view('hello.add');
  }

  public function create(Request $request){
    $params = [
      'name' => $request->name,
      'email' => $request->email,
      'age' => $request->age
    ];
    DB::insert('insert into people (name, email, age) values (:name, :email, :age)', $params);
    return redirect('/hello');
  }

  public function edit(Request $request){
    $params = ['id' => $request->id];
    $item = DB::select('select * from people where id = :id', $params);
    return view('hello.edit', ['form' => $item[0]]);
  }

  public function update(Request $request){
    $params = [
      'id' => $request->id,
      'name' => $request->name,
      'email' => $request->email,
      'age' => $request->age
    ];
    DB::update('update people set name = :name, email = :email, age = :age where id = :id', $params);
    return redirect('/hello');
  }

  public function show(Request $request){
    $item = DB::table('people')->where('id',$request->id)->first();
    return view('hello.show', ['item'=>$item]);
  }

}
