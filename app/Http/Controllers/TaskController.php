<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();

        $current_folder = Folder::find($id);

        // $tasks = Task::where('folder_id', $current_folder->id)->get();
        //選んだフォルダーに紐づいているタスクを取得する。
        $tasks = $current_folder->tasks()->get();

        return view('tasks/index', [

            //第一引数がテンプレート名で第二引数がテンプレートに渡すデータ、
            //第二引数には配列を渡す、キーがテンプレートで参照する際の変数名"
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function create(int $id, CreateTask $request)
    {
        $current_folder = Folder::find($id);
        $task = new Task();
        $task->title = $request->title;
        $task->due_date =  $request->due_date;
        //リレーションを活かしたデータの保存方法、フォルダーのidを持ったレコードになるのかな。
        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    }

    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
    //
}
