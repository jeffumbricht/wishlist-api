<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'link', 'user_id', 'buyer_id'];

    /**
     * Wishlist Item has a buyer
     */
    public function buyer()
    {
        return $this->hasOne('App\User', 'id', 'buyer_id');
    }

    /**
     * Wishlist Item has an owner
     */
    public function owner()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
