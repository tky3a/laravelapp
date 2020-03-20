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
    @foreach($people as $person)
    <tr>
      <td>{{$person->getData()}}</td>
      <!-- <td>{{ $person->id }}</td>
      <td>{{ $person->name }}</td>
      <td>{{ $person->email }}</td>
      <td>{{ $person->age }}</td> -->
    </tr>
    @endforeach
  </table>
@endsection

@section('footer')
  copyright 2017 tuyano
@endsection