<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $fillable = [
        'name',
        'desc',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class); //doubt
    }
}
