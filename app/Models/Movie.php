<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;

    protected $casts = [
        'released_at' => 'date',
    ];

    
  /* pour faire Movie::create(...), Attention PAS DE $request->all();
            */
    protected $guarded = [];


    public function duration(): Attribute
    {
        // in_array('toto', ['toto', 'titi']);
        // in_array(haystack: ['toto', 'titi'], needle: 'toto');

        return Attribute::make(
            get: function ($value) {
                $hours = floor($value / 60);
                $minutes = $value % 60;
                $zero = ($minutes < 10) ? '0' : '';

                return $hours.'h'.$zero.$minutes;
            }
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}