<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'rl_name' => 'User','rl_clearance' => 'Can view their patient details',],
            ['id' => 2, 'rl_name' => 'Administrator','rl_clearance' => 'Can create other regions and add hospitals',],
            ['id' => 3, 'rl_name' => 'Doctor','rl_clearance' => 'Can add and view patients and their details',],

        ];

        foreach ($items as $item) {
            Role::create($item);
        }
    }
}
