<?php

namespace App\Http\Controllers;

use App\Models\ApiTodoList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiTodoListController extends Controller
{
    //
    public function getList() {
        $result = ApiTodoList::orderBy('id', 'desc')->get();
        if (request()->has('search')) {
            $result = ApiTodoList::where('content', 'like', '%' . request()->search . '%')->orderBy('id', 'desc')->get();
        }
        return response()->json($result);
    }

    public function postList(Request $request) {
        $list = new ApiTodoList();
        $list->content = $request->content;
        $list->save();
        return response()->json(['status' => true, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function getListDetail($id, Request $request) {
        $result = ApiTodoList::find($id);
        return response()->json($result);
    }

    public function postUpdate($id, Request $request) {
        $list = ApiTodoList::find($id);
        $list->content = $request->content;
        $list->save();
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate!']);
    }

    public function postDelete($id, Request $request) {
        $list = ApiTodoList::find($id);
        $list->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
