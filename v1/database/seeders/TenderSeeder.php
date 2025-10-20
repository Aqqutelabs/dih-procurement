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
                'unit' => 1,
                'value' => 250000,
                'commodity_type' => 'Equipment',
                'currency' => 'USD',
                'quality_standard' => 'ISO 9001',
                'delivery_start_date' => Carbon::now()->addDays(7),
                'delivery_end_date' => Carbon::now()->addDays(21),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(3),
                'closing_date' => Carbon::now()->addDays(15),
                'bip_deadline' => Carbon::now()->addDays(18),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => true,
                'tid' => 'TNDR-2025-001',
                'delivery_location' => 'Abuja'
            ],
            [
                'user_id' => 1,
                'title' => 'Supply of Fertilizer',
                'description' => 'Tender for 10 tons of organic fertilizer.',
                'grade' => 'B',
                'quantity' => 10,
                'unit' => 1,
                'value' => 80000,
                'commodity_type' => 'Fertilizer',
                'currency' => 'NGN',
                'quality_standard' => 'NAFDAC Certified',
                'delivery_start_date' => Carbon::now()->addDays(10),
                'delivery_end_date' => Carbon::now()->addDays(25),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(5),
                'closing_date' => Carbon::now()->addDays(20),
                'bip_deadline' => Carbon::now()->addDays(22),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => false,
                'tid' => 'TNDR-2025-002',
                'delivery_location' => 'Lagos'
            ],
            [
                'user_id' => 1,
                'title' => 'Delivery of Agro Chemicals',
                'description' => 'Request for pesticide and herbicide supply.',
                'grade' => 'A',
                'quantity' => 100,
                'unit' => 1,
                'value' => 120000,
                'commodity_type' => 'Chemicals',
                'currency' => 'USD',
                'quality_standard' => 'ISO 14001',
                'delivery_start_date' => Carbon::now()->addDays(3),
                'delivery_end_date' => Carbon::now()->addDays(17),
                'publish_date' => Carbon::now(),
                'opening_date' => Carbon::now()->addDays(2),
                'closing_date' => Carbon::now()->addDays(14),
                'bip_deadline' => Carbon::now()->addDays(16),
                'timezone' => 'Africa/Lagos',
                'document' => null,
                'cross_border_tender' => true,
                'tid' => 'TNDR-2025-003',
                'delivery_location' => 'Kano'
            ],
        ];

        foreach ($tenders as $tender) {
            Tender::create($tender);
        }
    }
}
