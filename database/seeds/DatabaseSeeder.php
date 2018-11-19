<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SchoolRecommendSeeder::class);
        $this->call(CommunitySeeder::class);
        $this->call(CommunityUserSeeder::class);
    }
}
