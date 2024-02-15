<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateGenUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = User::create([
            'name' => 'G',
            'UserId' => 'G001',
            'email' => 'g@gmail.com',
            'password' => bcrypt('g@gmail.com')
        ]);
        $role = Role::create(['name' => 'Su']);
        $role->givePermissionTo([

            'role-list',
            'role-create',
            'role-delete',
            'role-edit',
        ]);
        $user->assignRole([$role->id]);
        
    }
}
