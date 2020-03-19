@extends('layouts.helloapp')

@section('title', 'Edit')

@section('menubar')
  @parent
  更新ページ
@endsection

@section('content')
  <table>
    <form action="/hello/edit" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $form->id }}">
      <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{ $form->name }}"></td>
      </tr>
      <tr>
        <th>email: </th>
        <td><input type="text" name="email" value="{{ $form->email }}"></td>
      </tr>
      <tr>
        <th>age: </th>
        <td><input type="text" name="age" value="{{ $form->age }}"></td>
      </tr>
      <tr>
        <th></th>
        <td><input type="submit" value="送信"></td>
      </tr>
    </form>
  </table>
@endsection