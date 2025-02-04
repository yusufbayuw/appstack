<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class M004LaravelMigration extends Model
{
    protected $casts = [
        'fields' => 'json',
    ]; 

    public function filament(): HasMany
    {
        return $this->hasMany(M005FilamentResource::class, 'laravel_migration_id');
    }
}
