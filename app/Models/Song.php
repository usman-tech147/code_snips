<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = "songs";
    public $timestamps = false;

//    protected $appends = ['release_date'];
//
//    public function getReleaseDateAttribute()
//    {
//        return Carbon::parse($this->created_at)->format('Y, F, d');
//    }

    public function album()
    {
        return $this->belongsTo(Album::class,'album_id');
    }
}
