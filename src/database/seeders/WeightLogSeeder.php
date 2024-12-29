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
        $user = User::first();

        WeightLog::factory()->count(35)->create([
            'user_id' => $user->id,
        ]);
    
    }
}
