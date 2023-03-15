<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Pringgo Juni Saputro',
            'email' => 'odyinggo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password
            'remember_token' => Str::random(10),
            'role_id' => 1,
        ];
        
        User::create($data);
    }
}
