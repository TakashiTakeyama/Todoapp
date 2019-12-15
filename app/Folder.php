<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
        //$this->hasMany('App\Task', 'folder_id', 'id');
        //第一引数がモデル名名前空間も含む、第二引数が関連するテーブルが持つ外部キーカラム名、第三引数はモデルにhasManyが定義されている側のテーブルが持つ、外部キーに紐づけられたカラム名
    }
    //
}
