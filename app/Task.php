<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{       //状態定義
        const STATUS = [
            1 => [ 'label' => '未着手', 'class' => 'label-dangeer' ],
            2 => [ 'label' => '着手中', 'class' => 'label-info' ],
            3 => [ 'label' => '完了', 'class' => ''],
        ];
    public function getGenderTextAttribute()
    {
        //Laravelではモデルクラスの属性データつまりカラムの値は$attributesという一つのプロパティで配列として管理されている
        //状態値
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '就職したい';
        }

        return self::STATUS[$status]['class '];

        // switch($this->attributes['gender']) {
        //     case 1:
        //         return 'male';
        //     case 2:
        //         return 'female';
        //     case 3:
        //         return '??';
        // }
    }

    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('y/m/d');
    }
}
