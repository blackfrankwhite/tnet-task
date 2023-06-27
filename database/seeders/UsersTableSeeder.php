<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    private $users = [
        [
            'name' => 'Super Administrator',
            'email' => 'superadmin@example.com',
            'password' => 'admin123',
            'role' => 'SuperAdministrator'
        ],
        [
            'name' => 'test user',
            'email' => 'test@example.com',
            'password' => 'test123',
            'role' => 'user'
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (User::count() == 0) {

            foreach ($this->users as $user) {
                $user = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => \Hash::make($user['password'])
                ]);
    
                $role = Role::where('name', $user['role'])->first();
                if ($role) {
                    $user->roles()->attach($role);
                }
            }            
        }
    }
}
