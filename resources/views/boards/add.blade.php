@extends('layouts.helloapp')

@section('title', 'Board Add')

@section('menubar')
  @parent
  投稿ページ
@endsection

@section('content')
  <table>
    <form action="/boards/add" method="post">
      {{ csrf_field() }}
      <tr>
        <th>Person ID:</th>
        <td><input type="number" name="person_id"></td>
      </tr>
      <tr>
        <th>Title:</th>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <th>Message:</th>
        <td><input type="text" name="message"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="新規作成"></td>
      </tr>
    </form>
  </table>
@endsection

@section('footer')
  copyright 2017 tuyano
@endsection