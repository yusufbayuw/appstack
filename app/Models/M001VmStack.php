<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class M001VmStack extends Model
{
    protected $casts = [
        'apt_packages' => 'json',
    ]; 

    public function laravel_stack(): HasMany
    {
        return $this->hasMany(M002LaravelStack::class, 'vm_stack_id');
    }
}
