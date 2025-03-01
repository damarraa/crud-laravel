<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'cover',
        'title',
        'description',
        'publish_date',
        'price',
        'stock'
    ];

    protected function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
