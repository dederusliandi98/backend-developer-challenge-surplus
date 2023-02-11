<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'enable'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\MasterData\Category')->withTimestamps();
    }

    public function images()
    {
        return $this->belongsToMany('App\Models\MasterData\Image', 'product_image')->withTimestamps();
    }
}
