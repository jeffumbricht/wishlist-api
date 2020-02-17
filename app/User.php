<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    /**
     * Get the wishlistItems for the user.
     */
    public function wishlistItems()
    {
        return $this->hasMany('App\WishlistItem');
    }

    /**
     * Get the wishlistItems user has marked as "buying".
     */
    public function wishlistItemsToBuy()
    {
        return $this->hasMany('App\WishlistItem', 'buyer_id', 'id');
    }
}
