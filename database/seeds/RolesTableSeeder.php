<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'administrator',
            'display_name' => 'Administrator',
            'description' => 'administrator can access admin panel',
        ]);

        DB::table('roles')->insert([
            'name' => 'instructor',
            'display_name' => 'Instructor',
            'description' => 'instructor can not access admin panel',
        ]);

        DB::table('roles')->insert([
            'name' => 'student',
            'display_name' => 'Student',
            'description' => 'student can not access admin panel',
        ]);
    }
}
