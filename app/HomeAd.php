<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int|null user_id
 * @property array|string|null country
 * @property array|string|null city
 * @method static paginate(int $int)
 * @method static where(string $string, string $string1, int|null $id)
 */
class HomeAd extends Model
{

    protected $fillable = [
        'city',
        'country',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
