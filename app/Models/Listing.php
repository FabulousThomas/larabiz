<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // ADD BELONGS TO RELATIONSHIP
    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}
