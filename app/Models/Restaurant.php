<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function restaurantFiles()
    {
        return $this->hasMany(RestaurantFile::class, 'restaurant_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
        //belongsTo: created_by use what?
    }
}