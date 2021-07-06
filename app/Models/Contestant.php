<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'contest_id', 'vote_count'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function contest()
    {
    	return $this->belongsTo(Contest::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function vote()
    {
        // return $this->increment('vote_count'); 
        $this->vote_count = $this->vote_count + 1; 
        $this->save();

        return;
    }

    public function unVote()
    {
        // return $this->decrement('vote_count'); 
        $this->vote_count = $this->vote_count - 1;
        $this->save();

        return;
    }
    
}
