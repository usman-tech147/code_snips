<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    //
    public function client()
    {
        return $this->belongsTo('App\Client','client_id') ;
    }
}
