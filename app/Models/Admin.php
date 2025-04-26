<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    protected $fillable = ['username', 'password', 'email'];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'created_by');
    }

    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class, 'created_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'created_by');
    }
}