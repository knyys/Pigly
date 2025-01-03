<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
    \Database\Seeders\UserSeeder::class,
    \Database\Seeders\WeightLogSeeder::class,
    \Database\Seeders\WeightTargetSeeder::class, 
]);
    }
}
