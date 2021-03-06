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
        $validate_rule = [
            'content' => 'required|string|max:20',
        ];
        $this->validate($request,$validate_rule);

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
        $item = $request->id;
        $param = [
        'content' => $request->content
        ];
        // dd($param);
        DB::table('todos')->where('id',$item)->update($param);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $param = [
            'id' =>$request->id];
            Db::table('todos')->where('id',$request->id)->delete();
            return redirect('/');
    }
}