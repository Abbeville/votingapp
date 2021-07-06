<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'award_category_id'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function contestants()
    {
    	return $this->belongsToMany(User::class, 'contestants', 'award_id', 'user_id')
    				->as('contesting');
    }
}
