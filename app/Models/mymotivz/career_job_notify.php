<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class career_job_notify extends Model
{

    public function education()
    {
        return $this->belongsTo(Education::class) ;
    }
}
