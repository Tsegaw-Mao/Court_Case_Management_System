<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',
            'view-role',
            'create-user',
            'edit-user',
            'delete-user',
            'view-user',
            'assign-user',
            'create-case',
            'edit-case',
            'delete-case',
            'view-case',
            'create-document',
            'edit-document',
            'delete-document',
            'view-document',
            'approve-request',
            'reject-request',
            'view-schedule'

         ];
 
          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}