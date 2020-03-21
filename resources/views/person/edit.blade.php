@extends('layouts.helloapp')

@section('title', 'Person Edit')

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
    <form action="/person/edit/{$person->id}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $person->id }}">
      <tr>
        <th>name: </th>
        <td><input type="text" name="name" value="{{ $person->name }}"></td>
      </tr>
      <tr>
        <th>email: </th>
        <td><input type="text" name="email" value="{{ $person->email  }}"></td>
      </tr>
      <tr>
        <th>age: </th>
        <td><input type="text" name="age" value="{{ $person->age }}"></td>
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