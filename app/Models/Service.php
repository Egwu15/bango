<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use Codebyray\ReviewRateable\Contracts\ReviewRateable;
use Codebyray\ReviewRateable\Traits\ReviewRateable as ReviewRateableTrait;

class Service extends Model implements ReviewRateable
{
    use HasFactory;
    use HasTags;
    use ReviewRateableTrait;


    protected $fillable = [
        'service_category',
        'price',
        'service_name',
        'description',
        'currency',

    ];

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
