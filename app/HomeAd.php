<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null user_id
 * @property array|string|null country
 * @property array|string|null city
 */
class HomeAd extends Model
{

    protected $fillable = [
        'city',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
