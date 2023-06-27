<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (Role::count() == 0) {
            Role::create(['name' => 'SuperAdministrator']);
            Role::create(['name' => 'user']);
        }
    }
}
