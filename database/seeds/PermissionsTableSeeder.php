<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'create_permission',
            'display_name' => 'Create Permission',
            'description' => 'user has create permission',
        ]);

        DB::table('permissions')->insert([
            'name' => 'update_permission',
            'display_name' => 'Update Permission',
            'description' => 'user has update permission',
        ]);

        DB::table('permissions')->insert([
            'name' => 'access_permission',
            'display_name' => 'Access Permission',
            'description' => 'user has access permission',
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete_permission',
            'display_name' => 'Delete Permission',
            'description' => 'user has delete permission',
        ]);
    }
}
