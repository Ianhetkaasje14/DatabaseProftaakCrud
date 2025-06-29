<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder //je gebruikt de seeder door php artisan db:seed --class=AdminUserSeeder 
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.nl',
            'password' => Hash::make('welkom123'),
            'is_admin' => true,
        ]);
    }
}
