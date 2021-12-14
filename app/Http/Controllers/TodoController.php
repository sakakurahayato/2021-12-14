<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ToDoController extends Controller
{
    public function index()
    {
        $items=DB::table('to_do')->get();
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
        DB::table('to_do')->insert($param);
        return redirect('/');
    }

    // 更新
    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'content' => $request->content,
            'created_at'=>$request->created_at,
            'updated_at'=>$request->update_at,
        ];
        DB::table('to_do')->where('id',$request->id)->update($param);
        return redirect('/');
    }

}