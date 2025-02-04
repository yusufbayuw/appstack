<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class M002LaravelStack extends Model
{
    protected $casts = [
        'composer_packages' => 'json',
    ]; 

    public function laravel_model(): HasMany
    {
        return $this->hasMany(M003LaravelModel::class, 'laravel_stack_id');
    }

    public function vm_stack(): BelongsTo
    {
        return $this->belongsTo(M001VmStack::class, 'vm_stack_id');
    }
}
