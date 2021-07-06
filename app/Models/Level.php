<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'levels';

    public function user(){
    	return $this->hasMany('App\User');
    }

    public function fee(){
        return $this->hasOne(Fee::class, 'fee_id', 'id');
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class, 'level_id', 'id');
    }


}
