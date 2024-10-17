<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (!User::where('email', 'luis@gmail.com')->exists()) {
            User::create([
                'name' => 'Luis Morales',
                'email' => 'luis@gmail.com',
                'phone'=>'0000000000',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]);
        }
    }
}
