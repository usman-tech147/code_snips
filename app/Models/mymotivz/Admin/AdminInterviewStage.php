<?php

namespace App\Models\mymotivz\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminInterviewStage extends Model
{
    protected $table = "admin_interview_stages";
    protected $fillable = ['name' , 'color'] ;
}
