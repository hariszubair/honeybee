<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
				'name' => "Steve",
                'email' => 'saifur@gmail.com',
                'status' => '1',
				'password' => bcrypt('saifur'),
        	),
        	array(
				'name' => "Laura",
                'email' => 'laura@gmail.com',
                'status' => '1',
				'password' => bcrypt('secret'),
        	)
        ));
    }
}
