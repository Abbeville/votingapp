<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'matric', 'email', 'level_id', 'department_id','payment_status', 'password', 'phone_number', 'avatar_url', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['fullname'];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }

    public function getRouteKeyName(){
        return 'username';
    }


    public function fullname(){
        return $this->firstname.' '.$this->lastname;
    }

    public function getFullnameAttribute()
    {
        return $this->fullname();
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function paymentStatus(){
        return $this->payment_status;
    }

    public function subcriptionStatus(){
        return $this->subscriptions->where('status', 'current')->first();
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class, 'user_id', 'id');
    }

    public function profileUpdated(){
        if ($this->avatar_url == NULL) {
            return false;
        }

        return true;
    }

    public function download(){
        $array = [];

        $array['old-name'] = $this->avatar;
        $array['new-name'] = $this->fullName().' '.$this->matric.' '.$this->level->name.' '.$this->programme->name;

        return $array;
    }

    public function votes()
    {
        return $this->hasMany(Vote::class, 'voter_id');
    }

    public function fingers(){
        return $this->hasMany(Finger::class,'student_id', 'id');
    }
}
