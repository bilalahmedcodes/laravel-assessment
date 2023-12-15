<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Bilal Ahmed',
            'email' => 'bilalahmedcodes@gmail.com',
            'password' => Hash::make('test12345'),
        ]);

        $role = Role::where('name', 'Super Admin')->first();
        $user->assignRole($role);
    }
}
