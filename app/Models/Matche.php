<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matche extends Model
{
    use HasFactory;

    protected $fillable = [
        'nickname',
        'first_name',
        'last_name',
        'surname',
        'bust_image',
        'full_image',
        'user_id',
        'date_of_birth',
        'place_of_birth',
        'height',
        'academic',
        'field_of_edu',
        'diocese',
        'church',
        'about',
        'proposal_id',
        'eduqual_id',
        'edufield_id',
        'fname',
        'mname',
        'foccu',
        'moccu',
        'sisters',
        'brothers',
        'about_family',
        'proposal_id',
        'occupation',
        'designation',
        'organization',
        'country',
        'proposal_id',
        'occupation_id',
        'designation_id',
        'organization_id',
        'category_id',
        'country_id',
        'state_id',
        'city_id',
        'diocese_id',
        'membership',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function eduqual(): BelongsTo
    {
        return $this->belongsTo(Eduqual::class);
    }

    public function edufield(): BelongsTo
    {
        return $this->belongsTo(Edufield::class);
    }

    public function Occupation(): BelongsTo
    {
        return $this->belongsTo(Occupation::class);
    }

    public function Organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function Designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class);
    }

    public function Country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function Diocese(): BelongsTo
    {
        return $this->belongsTo(Diocese::class);
    }

   
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }


}
