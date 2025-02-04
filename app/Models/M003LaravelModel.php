<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class M003LaravelModel extends Model
{
    protected $casts = [
        'fields' => 'json',
        'relationships' => 'json',
    ]; 

    public function laravel_migration(): HasOne
    {
        return $this->hasOne(M004LaravelMigration::class, 'laravel_model_id');
    }

    public function laravel_stack(): BelongsTo
    {
        return $this->belongsTo(M002LaravelStack::class, 'laravel_stack_id');
    }
}
