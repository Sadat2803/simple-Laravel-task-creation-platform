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
        $this->call(RangeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RequestSeeder::class);
    }
}
