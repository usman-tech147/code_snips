<?php
namespace App\Models\mymotivz;

use Illuminate\Database\Eloquent\Model;

class candidate_resume extends Model
{
    protected $fillable = ['resume' , 'candidate_id'] ;

    public function new_candidate()
    {
        return $this->belongsTo(NewCandidate::class) ;
    }
}
