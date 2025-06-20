<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightLog;
use App\Models\User;

class WeightLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        WeightLog::factory()->count(35)->forUser($user)->create(); 
    }
}
