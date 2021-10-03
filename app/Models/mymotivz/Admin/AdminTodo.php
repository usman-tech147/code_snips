<?php

namespace App\Models\mymotivz\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminTodo extends Model
{
    protected $table = "admin_todos";
    public function adminTodoAction()
    {
        return $this->belongsTo(AdminTodoAction::class) ;
    }
}
