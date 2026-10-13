<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property bool $completed
 * @property Carbon|null $due_to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $completed_at
 * @property int $user_id
 */
#[Fillable(['name', 'due_to', 'completed', 'user_id'])]
class Task extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'due_to' => 'datetime',
            'completed' => 'boolean',
            'user_id' => 'integer',
            'completed_at' => 'datetime',
        ];
    }
}
