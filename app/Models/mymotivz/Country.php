<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function clients()
    {
        return $this->hasMany(NewClient::class) ;
    }
}
