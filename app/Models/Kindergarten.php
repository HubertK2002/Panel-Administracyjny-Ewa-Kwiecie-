<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kindergarten extends Model
{
    protected $table = 'wp_przedszkola';

    protected $fillable = ['nazwa', 'miejscowosc', 'ulica', 'numer', 'kod_pocztowy'];
}
