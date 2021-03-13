<?php

namespace App;

use App\Image;
use App\Order;
use App\Payment;
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
        'name', 
        'email', 
        'password', 
        // admin_since
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

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'admin_since',
    ];

    /* specifying customer id after model to be consistent with the user table as laravel only allow 
        consistency. Order table has customer_id. Laravel automatically looks for user_id as there is User
        model which cause error. But mentioning customer_id inside paranthesis will make laravel know that
        the f.k. for User table is customer_id.
    */
    public function orders(){
       return $this->hasMany(Order::class, 'customer_id');
    }

    public function payments(){
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id', 'order_id', 'id');
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
      }
}