<?php

namespace App\Models\mymotivz\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminTodoAction extends Model
{
    protected $table = "admin_todo_actions";
    public function adminTodo()
    {
        return $this->hasMany(AdminTodo::class) ;
    }
}
