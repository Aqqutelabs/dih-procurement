<?php

namespace Database\Seeders;

use App\Models\Tender;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenders = [
            [
                'user_id' => 1,
                'title' => 'Supply of Farm Equipment',
                'description' => 'Procurement of tractors and related machinery.',
                'grade' => 'A',
                'quantity' => 50,
                'unit' => 'Kilograms',
                'value' => 250000,
                'commodity_type' => 'Equipment',
                'currency' => 'USD',
                'quality_standard' => ['ISO 9001', 'NGN Standard'],
                'delivery_start_date' => Carbon::now()->addDays(7),
                'delivery_end_date' => Carbon::now()->addDays(21),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(3),
                'closing_date' => Carbon::now()->addDays(15),
                'bid_deadline' => Carbon::now()->addDays(18),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => true,
                'delivery_location' => 'Abuja'
            ],
            [
                'user_id' => 1,
                'title' => 'Supply of Fertilizer',
                'description' => 'Tender for 10 tons of organic fertilizer.',
                'grade' => 'B',
                'quantity' => 10,
                'unit' => 'Tons',
                'value' => 80000,
                'commodity_type' => 'Fertilizer',
                'currency' => 'NGN',
                'quality_standard' => ['NAFDAC Certified', 'ISO 8080'],
                'delivery_start_date' => Carbon::now()->addDays(10),
                'delivery_end_date' => Carbon::now()->addDays(25),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(5),
                'closing_date' => Carbon::now()->addDays(20),
                'bid_deadline' => Carbon::now()->addDays(22),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => false,
                'delivery_location' => 'Lagos'
            ],
            [
                'user_id' => 1,
                'title' => 'Delivery of Agro Chemicals',
                'description' => 'Request for pesticide and herbicide supply.',
                'grade' => 'A',
                'quantity' => 100,
                'unit' => 'Pounds',
                'value' => 120000,
                'commodity_type' => 'Chemicals',
                'currency' => 'USD',
                'quality_standard' => ['ISO 20001', 'ISO 9001'],
                'delivery_start_date' => Carbon::now()->addDays(3),
                'delivery_end_date' => Carbon::now()->addDays(17),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(2),
                'closing_date' => Carbon::now()->addDays(14),
                'bid_deadline' => Carbon::now()->addDays(16),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => true,
                'delivery_location' => 'Kano'
            ],
        ];

        foreach ($tenders as $tender) {
            Tender::create($tender);
        }
    }
}
