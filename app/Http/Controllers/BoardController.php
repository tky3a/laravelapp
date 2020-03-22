<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  public function index(Request $request)
  {
    // $boards = Board::all();
    $boards = Board::with('person')->get();
    return view('boards.index',['boards'=>$boards]);
  }

  public function add(Request $request)
  {
    return view('boards.add');
  }

  public function create(Request $request)
  {
    $this->validate($request, Board::$rules);
    $board = new Board;
    $params = $request->all();
    unset($params['_token']);
    $board->fill($params)->save();
    return redirect('/boards');
  }
}
