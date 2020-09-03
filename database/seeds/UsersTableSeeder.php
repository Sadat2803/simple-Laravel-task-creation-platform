<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        factory(App\User::class, 1)->create(['id'=>1,'email' => 'demo1@example.com','department_id'=>1,'range_id'=>3]);
        factory(App\User::class, 1)->create(['id'=>2,'email' => 'demo2@example.com','department_id'=>2,'range_id'=>3]);

    }
}
