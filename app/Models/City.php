<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $guarded =[];
    /**
     * Get all of the location for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function location(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
