<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\todo;

class ToDoController extends Controller
{
    public function index()
    {
        $items=DB::table('todos')->get();
        return view('layouts.ToDo',['items'=>$items]);
    }

    public function create(Request $request)
    {
        $param = [
            'id' => $request -> id,
            'content' => $request->content,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->update_at,
        ];
        DB::table('todos')->insert($param);
        return redirect('/');
    }

    // 更新
    public function update(Request $request)
    {
        $items = DB::table('todos')->where('id',$request->id)->get();
        $param = [
            'id' => $request -> id,
            'content' => $request->content,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->update_at,
        ];
        dd($param);
        DB::table('todos')->where('id',$items->id)->update($param);
        return redirect('/');

    }

}