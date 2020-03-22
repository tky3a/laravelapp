@extends('layouts.helloapp')

@section('title', 'Board index')

@section('menubar')
  @parent
  ボード・ページ
@endsection

@section('content')
  <table>
    <tr>
      <th>Message</th>
      <th>Name</th>
    </tr>
    @foreach($boards as $board)
      <tr>
        <td>{{ $board->message }}</td>
        <td>{{ $board->person->name }}</td>
      </tr>
    @endforeach
  </table>
@endsection

@section('footer')
  copyright 2017 tuyano
@endsection