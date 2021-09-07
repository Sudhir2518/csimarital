<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'matche_id',
        'matche_user_id',
        'liked_user_match',
        'token',
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Matche(): BelongsTo
    {
        return $this->belongsTo(Matche::class);
    }
}
