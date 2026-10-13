<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    protected $table = 'wp_zgloszenia';

    public $timestamps = false;

    protected function casts(): array
    {
        return ['data_zgloszenia' => 'datetime'];
    }

    public function kindergarten(): BelongsTo
    {
        return $this->belongsTo(Kindergarten::class, 'przedszkole_id');
    }
}
