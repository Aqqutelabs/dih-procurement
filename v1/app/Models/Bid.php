<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $guarded = [];

    protected $casts = [
        'document' => 'array',
    ];

    public function vendor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tender()
    {
        return $this->belongsTo(Tender::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }
}
