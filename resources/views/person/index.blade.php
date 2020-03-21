@extends('layouts.helloapp')

@section('title', 'Person index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
  <table>
    <!-- <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Age</th>
    </tr> -->
    <form action="{{ url('/person') }}" method="post">
    {{ csrf_field() }}
    @foreach($people as $person)
    <tr>
      <td>
        <a href="{{ 'person/edit/' . $person->id }}">{{ $person->id }}</a>
      </td>
      <td>{{$person->getData()}}</td>
      <!-- <td>{{ $person->id }}</td>
      <td>{{ $person->name }}</td>
      <td>{{ $person->email }}</td>
      <td>{{ $person->age }}</td> -->
        <td><button type="submit" name="delete_id" value="{{ $person->id }}">削除</button></td>
    </tr>
    @endforeach
    </form>
  </table>
@endsection

@section('footer')
  copyright 2017 tuyano
@endsection