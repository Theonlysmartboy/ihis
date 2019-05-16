<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'st_name' => 'Pending','st_desc' => 'Not yet confirmed',],
            ['id' => 2, 'st_name' => 'Confirmed','st_desc' => 'Confirmed',],
            ['id' => 3, 'st_name' => 'Cancelled','st_desc' => 'Cancelled',],
            ['id' => 4, 'st_name' => 'Active','st_desc' => 'Is in use',],
            ['id' => 5, 'st_name' => 'Dormant','st_desc' => 'Not in use',],

        ];

        foreach ($items as $item) {
            Status::create($item);
        }
    }
}
