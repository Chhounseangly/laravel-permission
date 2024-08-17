<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'owner'
        ]);
        Permission::create([
            'name' => 'edit',
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ])->assignRole(RolesEnum::ADMIN->value);

        User::create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
        ])->assignRole(RolesEnum::OWNER->value);
    }
}
