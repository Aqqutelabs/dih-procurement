<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $guarded = [];

    protected $casts = [
        'opening_date' => 'datetime',
        'bip_deadline' => 'datetime',
        'delivery_start_date' => 'datetime',
        'delivery_end_date' => 'datetime',
        'closing_date' => 'datetime',
    ];


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tender) {
            $year = now()->year;

            $lastTender = self::whereYear('created_at', $year)
                ->orderBy('id', 'desc')
                ->first();

            $nextNo = $lastTender ? ((int) substr($lastTender->tid, -3)) + 1 : 1;

            $zeroNextNo = str_pad($nextNo, 3, '0', STR_PAD_LEFT);
            $tender->tid = "TNDR-{$year}-{$zeroNextNo}";
        });
    }
}
