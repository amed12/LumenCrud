<?php

namespace App\Http\Controllers;

use App\ModelTodo;
use Illuminate\Http\Request;

class todoController extends Controller
{

    public function index()
    {
        $data = ModelTodo::all();
        return response($data);
    }
    public function show($id){
        $data = ModelTodo::where('id',$id)->get();
        return response ($data);
    }

    public function store(Request $request)
    {
        $data = new ModelTodo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response('Berhasil tambah data');

    }

    public function update(Request $request, $id){
        $data = ModelTodo::where('id',$id)->first();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response('Berhasil merubah data');
    }

    public function destroy($id)
    {
        $data = ModelTodo::where('id',$id)->first();
        $data->delete();

        return response('Berhasil menghapus data');
    }

}
