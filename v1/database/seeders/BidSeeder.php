<?php

namespace Database\Seeders;

use App\Models\Bid;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bids = [
            [
                'user_id' => 2,
                'buyer_name' => 'AgroTrade Ventures',
                'tender_id' => 1,
                'category_id' => 1,
                'amount' => 50000,
                'delivery_location' => 'Lagos',
                'delivery_date' => Carbon::now()->addDays(20),
                'note' => 'Fast delivery with 2-year warranty.',
                'document' => null,
                'quantity' => 25,
                'unit_price' => 2000,
                'status' => 'Under Review',
            ],

            // [
            //     'user_id' => 2,
            //     'buyer_name' => 'GreenFarm Nigeria Ltd',
            //     'tender_id' => 2,
            //     'category_id' => 2,
            //     'amount' => 30000,
            //     'delivery_location' => 'Kaduna',
            //     'delivery_date' => Carbon::now()->addDays(15),
            //     'note' => 'Premium organic fertilizer guaranteed.',
            //     'document' => null,
            //     'quantity' => 10,
            //     'unit_price' => 3000,
            //     'status' => 'Accepted',
            // ],

            // [
            //     'user_id' => 2,
            //     'buyer_name' => 'Harvest Hub Ltd',
            //     'tender_id' => 3,
            //     'category_id' => 3,
            //     'amount' => 40000,
            //     'delivery_location' => 'Abuja',
            //     'delivery_date' => Carbon::now()->addDays(12),
            //     'note' => 'Quality assurance included.',
            //     'document' => null,
            //     'quantity' => 20,
            //     'unit_price' => 2000,
            //     'status' => 'Rejected',
            // ],
        ];

        foreach ($bids as $bid) {
            Bid::create($bid);
        }
    }
}
