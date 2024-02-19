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
            'view-schedule',
            'list-attornies',
            'list-judges',
            'list-lawyers',
            'list-detectives',
            'list-wittnesses',
            'list-plaintiffs',
            'list-defendants',
            'assign-attorney',
            'assign-detective',
            'assign-judge',
            'send-to-attorney',
            'send-to-judge',
            'send-back-to-attorney',
            'send-back-to-detective',
            'attorney-accept',
            'judge-accept',
            'judge-veridct'


         ];

          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            if(Permission::where('name',$permission)->first() == null)
            Permission::create(['name' => $permission]);
          }
    }
}
