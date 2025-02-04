<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M005FilamentResource extends Model
{
    protected $casts = [
        'fields' => 'json',
        'columns' => 'json',
    ];

    public function laravel_migration(): BelongsTo
    {
        return $this->belongsTo(M004LaravelMigration::class, 'laravel_stack_id');
    }
}
