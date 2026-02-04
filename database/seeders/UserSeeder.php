<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lê Tiến Phát',
            'email' => 'letienphat@gmail.com',
            'password' => 'password',
            'role' => 'admin',
            'status' => 'active' ,
        ]);
    }
}
