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
        return response()->json($result);
    }

    public function postList(Request $request) {
        $list = new ApiTodoList();
        $list->content ="fssfs";
        $list->save();
        return response()->json(['status' => true, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function postUpdate(Request $request) {
        $list = ApiTodoList::find($request->id);
        $list->content = $request->content;
        $list->save();
        return response()->json(['status' => true, 'message' => 'Data berhasil diupdate!']);
    }

    public function postDelete(Request $request) {
        $list = ApiTodoList::find($request->id);
        $list->delete();
        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
    }
}
