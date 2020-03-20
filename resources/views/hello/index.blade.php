@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
  @parent
  インデックスページ
@endsection

@section('content')
<form action="/hello/delete" method="post">
{{ csrf_field() }}
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Mail</th>
    <th>Age</th>
  </tr>
  @foreach($items as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->age }}</td>
      <td><button type="submit" name="delete_id" value="{{ $item->id }}">削除</button></td>
    </tr>
  @endforeach
</table>
</form>
@endsection

@section('footer')
copyright 2017 tuyano
@endsection