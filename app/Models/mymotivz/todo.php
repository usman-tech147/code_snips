<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    //
    public function action()
    {
        return $this->belongsTo(todo_action::class) ;
    }
}
