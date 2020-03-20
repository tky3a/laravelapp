@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
  @parent
  詳細ページ
@endsection

@section('content')
  <table>
    @foreach ($items as $item)
    <tr>
      <th>id: </th>
      <td>{{ $item->id }}</td>
      <th>name: </th>
      <td>{{ $item->name }}</td>
      <th>email: </th>
      <td>{{ $item->email }}</td>
      <th>age: </th>
      <td>{{ $item->age }}</td>
    </tr>
    @endforeach
  </table>
@endsection

@section('footer')
copyright 2017 tuyano
@endsection