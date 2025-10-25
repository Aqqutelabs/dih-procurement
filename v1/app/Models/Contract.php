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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contract) {
            $year = now()->year;

            $lastContract = self::whereYear('created_at', $year)
                ->orderBy('id', 'desc')
                ->first();

            $nextNo = $lastContract ? ((int) substr($lastContract->cid, -3)) + 1 : 1;

            $zeroNextNo = str_pad($nextNo, 3, '0', STR_PAD_LEFT);
            $contract->cid = "CNT-{$year}-{$zeroNextNo}";
        });
    }
}
