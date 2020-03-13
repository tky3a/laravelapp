<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator; #Validatorメソッドを使う

class HelloController extends Controller
{
  public function index(Request $request) {
    // $data = [
    //   'msg' => "これはコントローラーから渡されたメッセージ",
    // ];
    // $citys = array (
    //   'kanagawa' => '横浜',
    //   'osaka' => '大阪',
    //   'fukuoka' => '福岡'
    // );
    // $data = ['one', 'twe', 'three', 'four', 'five'];
    // return view('hello.index', ['msg' => ''])->with('citys', $citys);
    // $data = [
    //   ['name' => '山田太郎', 'mail' => 'taro@yamada'],
    //   ['name' => '田中はなこ', 'mail' => 'hanako@flowar'],
    //   ['name' => '鈴木幸子', 'mail' => 'satiko@suzuki'],
    // ];
    // return view('hello.index', ['data'=>$request->data]);

    // $validator = Validator::make($request->query(),[
    //   'id' => 'required',
    //   'pass' => 'required'
    // ]);
    // if ($validator->fails()) {
    //   $msg = 'クエリーに問題があります';
    // } else {
    //   dump($validator);
    //   $msg = 'ID/PASSを受け付けました。フォーム入力してください';
    // }
    return view('hello.index', ['msg'=>'フォームを入力してください']);
  }

  public function post(HelloRequest $request){
    // $validate_rule = [
    //   'name' => 'required',
    //   'mail' => 'email',
    //   'age' => 'numeric|between:0,150',
    // ];
    // $this->validate($request, $validate_rule);
    // dd($request->name);

    // $validator = Validator::make($request->all(),[
    //   'name' => 'required',
    //   'mail' => 'email',
    //   'age' => 'numeric|between:0,150',
    // ]);
    // if($validator->fails()){
    //   return redirect('/hello')->withErrors($validator)->withInput();
    // }

    // $rules = [
    //   'name' => 'required',
    //   'mail' => 'email',
    //   'age' => 'numeric',
    // ];

    // $messages = [
    //   'name.required' => '名前は必ず入力して下さい',
    //   'mail.email' => 'メールアドレスが必要です',
    //   'age.numeric' => '年齢を整数で入力してください',
    //   'age.min' => '年齢は０歳以上で入力してください',
    //   // 'age.between' => '年齢は0~150の間で入力してください',
    // ];
    // $validator = Validator::make($request->all(), $rules, $messages);
    // $validator->sometimes('age', 'min:0',function($input){
    //   return !is_int($input->age);
    // });

    // if ($validator->fails()){
    //   return redirect('/hello')->withErrors($validator)->withInput();
    // }

    return view('hello.index',['msg' => '正しく入力されました']);
  }
}
