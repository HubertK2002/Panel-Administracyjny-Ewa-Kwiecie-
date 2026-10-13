<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kindergarten extends Model
{
    protected $fillable = ['name', 'address', 'town', 'street', 'street_number', 'postal_code'];
}
