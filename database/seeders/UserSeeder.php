<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

        // Ista stvar kao u liniji 18
        // User::factory()
        //     ->count(20)
        //     ->create();

        // Napredniji (i najbolji) nacin da kreirate povezane entitete
        // Dakle ako vam za svakog usera treba npr 5 postova
        // User::factory(20)
        //     ->hasPosts(5)
        //     ->create();
    }
}
