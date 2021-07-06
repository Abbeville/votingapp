<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finger extends Model
{
    use HasFactory;

    protected $fillable =['student_id', 'finger_data'];
    
    public function student(){
        return $this->belongsTo('App\Student');
    }
}
