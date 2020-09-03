<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password','range_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getLatestMessage(){

        return Message::where( function($q){
            $q->where('from_id', auth()->id());
            $q->where('to_id', $this->id);
        })->orWhere(function($q){
            $q->where('from_id', $this->id);
            $q->where('to_id', auth()->id());
        })
        ->orderBy('id', 'desc')
        ->first();

    }
    public function isAdmin()
    {
        return User::findOrFail($this->id)->role==1;
    }
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

}
