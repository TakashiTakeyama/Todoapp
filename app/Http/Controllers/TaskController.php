<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();

        $current_folder =Folder::find($id);

        $tasks = Task::where('folder_id', $current_folder->id)->get();

        return view('tasks/index', [

            //第一引数がテンプレート名で第二引数がテンプレートに渡すデータ、
            //第二引数には配列を渡す、キーがテンプレートで参照する際の変数名"
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }
    //
}
