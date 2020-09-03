<?php

use Illuminate\Database\Seeder;
use App\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Department::class, 1)->create(['name'=>'deptA','location'=>'local','type'=>'FN']);
        factory(App\Department::class, 1)->create(['name'=>'deptB','location'=>'abroad','type'=>'FN']);
    }
}
