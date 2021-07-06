<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function votes()
    {
    	return $this->hasMany(Vote::class);
    }

    public function contestants()
    {
        return $this->hasMany(Contestant::class);
    }

}
