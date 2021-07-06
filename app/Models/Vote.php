<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['contestant_id', 'voter_id', 'contest_id'];

    public function voter()
    {
    	return $this->belongsTo(User::class, 'voter_id', 'id');
    }

    public function contest()
    {
    	return $this->belongsTo(Contest::class);
    }

    public function contestant()
    {
    	return $this->belongsTo(Contestant::class);
    }

    public function votedFor(Contestant $contestant)
    {
        $this->contestant_id = $contestant->id;
        $this->save();

        return $this;
    }
}
