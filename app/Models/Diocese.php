<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diocese extends Model
{
    use HasFactory;

    protected $fillable = [
        'diocese'
    ];

    public function matches(): HasMany
    {
        return $this->hasMany(Matche::class);
    }
}
