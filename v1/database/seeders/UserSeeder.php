<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ben Buyer',
                'email' => 'buyer@example.com',
                'password' => Hash::make('12345678'),
                'role' => 'buyer',
                'country' => 'Nigeria',
                'phone_number' => '08012345678',
                'business_name' => 'Buyer Ventures',
            ],
            [
                'name' => 'Vicky Vendor',
                'email' => 'vendor@mail.com',
                'password' => Hash::make('12345678'),
                'role' => 'vendor',
                'country' => 'Nigeria',
                'phone_number' => '08012345678',
                'business_name' => 'Vendor Ventures',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
