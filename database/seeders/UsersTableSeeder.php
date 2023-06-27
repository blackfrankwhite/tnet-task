<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (User::count() == 0) {

            $user = User::create([
                'name' => 'Super Administrator',
                'email' => 'superadmin@example.com',
                'password' => \Hash::make('admin123'),  
            ]);

            $role = Role::where('name', 'SuperAdministrator')->first();
            if ($role) {
                $user->roles()->attach($role);
            }
        }
    }
}
