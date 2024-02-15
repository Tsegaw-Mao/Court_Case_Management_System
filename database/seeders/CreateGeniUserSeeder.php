<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CreateGeniUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Geni',
            'UserId' => 'Geni001',
            'email' => 'geni@gmail.com',
            'password' => bcrypt('geni@gmail.com')
        ]);
        $role = Role::create(['name' => 'Super']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
