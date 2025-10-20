<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $guarded = [];

    public function bid()
    {
        return $this->belongsTo(Bid::class);
    }

    // public function vendor()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function tender()
    // {
    //     return $this->belongsTo(Tender::class, 'tender_id');
    // }
}
