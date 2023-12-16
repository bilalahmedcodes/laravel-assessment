<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'guard' => 'web',
        ]);

        // Seed data for Client role
        DB::table('roles')->insert([
            'name' => 'Client',
            'guard' => 'web',
        ]);
    }
}
