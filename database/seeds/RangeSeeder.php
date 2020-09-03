<?php

use Illuminate\Database\Seeder;
use App\Range;
class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Range::class, 1)->create(['id'=>1,'number' => 1,'name'=>'junior']);
        factory(App\Range::class, 1)->create(['id'=>2,'number' => 2,'name'=>'confirmed']);
        factory(App\Range::class, 1)->create(['id'=>3,'number' => 3,'name'=>'senior']);
    }
}
