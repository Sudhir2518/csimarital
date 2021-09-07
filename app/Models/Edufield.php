<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Edufield extends Model
{
    use HasFactory;

    private $protected = [
        'edufield_name'
    ];


    public function matches(): HasMany
    {
        return $this->hasMany(Matche::class);
    }
}
