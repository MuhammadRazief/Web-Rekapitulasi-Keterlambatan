<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1'),
            'role' => 'admin',
        ]);

        $data = [
            [
            'name' => 'ps',
            'email' => 'pembimbing@gmail.com',
            'password' => Hash::make('pembimbing1'),
            'role' => 'ps',
        ],
    ];
    
    User::insert($data);
    }
}
