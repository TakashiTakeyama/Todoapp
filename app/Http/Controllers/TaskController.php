<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();

        return view('tasks/index', [

            //第一引数がテンプレート名で第二引数がテンプレートに渡すデータ、
            //第二引数には配列を渡す、キーがテンプレートで参照する際の変数名"
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }
    //
}
