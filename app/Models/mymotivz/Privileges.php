<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
    //
    public function user()
    {
        return $this->belongsToMany(User::class) ;
    }
}
