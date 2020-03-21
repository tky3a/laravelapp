@extends('layouts.helloapp')

@section('title', 'Person Add')

@section('menubar')
  @parent
   新規作成
@endsection

@section('content')
  @if(count($errors) > 0)
    <div>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <table>
    <form action="/person/create" method="post">
      {{ csrf_field() }}
      <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{ old('name') }}"></td>
      </tr>
      <tr>
        <th>email: </th>
        <td><input type="text" name="email" value="{{ old('email') }}"></td>
      </tr>
      <tr>
        <th>age: </th>
        <td><input type="text" name="age" value="{{ old('age') }}"></td>
      </tr>
      <tr>
        <th></th>
        <td>
        <input type="submit" value="send">
        </td>
      </tr>
    </form>
  </table>
@endsection