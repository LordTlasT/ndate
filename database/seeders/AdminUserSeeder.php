<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => 1,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'asena',
            'email' => 'asena@olive.be',
            'password' => Hash::make('sketchpad'),
            'is_admin' => 0,
            'email_verified_at' => now(),
        ]);
    }
}