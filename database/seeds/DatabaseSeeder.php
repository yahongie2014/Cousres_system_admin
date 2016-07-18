<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // users table seeds
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'user_type' => 1,
            'status' => 1,
        ]);

        // users table seeds
        DB::table('roles')->insert([
            'name' => 'admin',
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

        // permissions table seeds
        DB::table('permissions')->insert([
            'name' => 'question',
            'display_name' => 'question',
            'description' => 'question',
        ]);

        DB::table('permissions')->insert([
            'name' => 'exam',
            'display_name' => 'exam',
            'description' => 'exam',
        ]);
    }
}
