<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Alex Fite', 
            'email' => 'alex@gmail.com',
            'password' => Hash::make('alex123')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Tsegaw Ma', 
            'email' => 'tsegaw@gmail.com',
            'password' => Hash::make('tsegaw123')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'Genet Worku', 
            'email' => 'genet@gmail.com',
            'password' => Hash::make('genet123')
        ]);
        $productManager->assignRole('Product Manager');
    }
}