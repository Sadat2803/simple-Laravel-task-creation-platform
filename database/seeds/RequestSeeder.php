<?php

use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Request::class, 1)->create(['user_id' => 2,'range_id'=>3]);
        factory(App\Request::class, 1)->create(['user_id' => 2,'range_id'=>3]);
    }
}
