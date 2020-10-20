<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const ADMIN = 'admin';
    const TOURIST = 'tourist';
    const GUIDE = 'guide';
    protected $fillable = [
        'type', 'email', 'password',
    ];
    public function guide(){
        return $this->isGuide() ? $this->hasOne('App\TourGuide', 'user_id') : null;
    }

    public function tourist(){
       // return $this->isTourist() ? $this->hasOne('App\Tourist', 'user_id') : null;
      return $this->hasOne(Tourist::class, 'user_id') ;
    }

    public function isAdmin()    {
        return $this->type === self::ADMIN;
    }

    public function isGuide()    {
        return $this->type === self::GUIDE;
    }

    public function isTourist()    {
        return $this->type === self::TOURIST;
    }

    public static function defaultAdmin(){
        if (!User::where('email', '=', 'admin@otgms.com')->exists()) {
            User::create([
                'type'=>'admin',
                'email'=>'admin@otgms.com',
                'password' => Hash::make('pass123')
            ])->save();
         }
    }

    public function bookings(){
        if($this->type == 'admin'){
            return Booking::all();
        }
    }



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
}
