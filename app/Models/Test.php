<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'image_path',
    ];

    public function favoredBy()
    {
        return $this->belongsToMany(User::class, 'favorites')
                    ->withTimestamps();
    }
    public function carts()
{
    return $this->hasMany(Cart::class);
}

}