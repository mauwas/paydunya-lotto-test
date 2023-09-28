<?php

namespace Database\Seeders;

use App\Models\Jackpot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InitJackpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Jackpot::first()) {
            Jackpot::create([
                "amount" => 20000000.00
            ]);
        }
    }
}
