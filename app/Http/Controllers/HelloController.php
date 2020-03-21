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
    $items = DB::table('people')->orderBy('age', 'desc')->get();
    return view('hello.index', ['items' => $items]);

    // var_dump('hoge');
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
    DB::table('people')->insert($params);
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
    DB::table('people')->where('id', $request->id)->update($params);
    return redirect('/hello');
  }

  public function show(Request $request){
    $page = $request->page;
    $items = DB::table('people')
      ->offset($page * 3)
      ->limit(3)
      ->get();
    // $items = DB::table('people')->where('id','<=', $request->id)->get();
    return view('hello.show', ['items'=>$items]);
  }

  public function delete(Request $request){
    $id = $request->delete_id;
    $person = DB::table('people')->where('id', $id);
    $person->delete();
    return redirect('/hello');
  }

}
