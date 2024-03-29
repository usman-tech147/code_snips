<?php

namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['name' , 'color'] ;

    public function candidates()
    {
        return $this->hasMany(Candidate::class) ;
    }
}
