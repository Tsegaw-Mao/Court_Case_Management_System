<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $judge = Role::create(['name' => 'judge']);
        $attorney = Role::create(['name' => 'attorney']);
        $detective = Role::create(['name' => 'detective']);
        $clerk = Role::create(['name' => 'clerk']);
        $plaintiff = Role::create(['name' => 'plaintiff']);
        $defendant = Role::create(['name' => 'defendant']);
        $admin_judge = Role::create(['name' => 'admin_judge']);
        $admin_attorney = Role::create(['name' => 'admin_attorney']);
        $admin_detective = Role::create(['name' => 'admin_detective']);
        $user = Role::create(['name'=> 'user']);

        $admin->givePermissionTo([
            'create-role',
            'edit-role',
            'delete-role',
            'view-role',
            'create-user',
            'edit-user',
            'delete-user',
            'view-user'
        ]);

        $judge->givePermissionTo([
            'approve-request',
            'reject-request',
            'view-document',
            'view-case',
            'list-judges',
            'judge-veridct',
            'list-wittnesses',
            'list-plaintiffs',
            'list-defendants'
        ]);

        $attorney->givePermissionTo([
            'view-document',
            'view-case',
            'list-attornies',
            'send-to-judge',
            'list-defendants',
            'list-plaintiffs'
        ]);
        $detective->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'create-document',
            'view-case',
            'list-detectives'
        
        ]);
        $clerk->givePermissionTo([
            'create-case',
            'edit-case',
            'delete-case',
            'view-case',
            'list-plaintiffs',
            'list-defendants'
        ]);
        $plaintiff->givePermissionTo([
            'view-case',
        ]);
        $defendant->givePermissionTo([
            'view-case',
        ]);
        $user->givePermissionTo([
            'view-case'
            ]);
        $admin_judge->givePermissionTo([
            'approve-request',
            'reject-request',
            'view-document',
            'view-case',
            'list-judges',
            'judge-veridct',
            'list-wittnesses',
            'list-plaintiffs',
            'list-defendants',
            'judge-accept',
            'send-back-to-attorney',
            'assign-judge'

        ]);
        $admin_attorney->givePermissionTo([
            'view-document',
            'view-case',
            'list-attornies',
            'send-to-judge',
            'list-defendants',
            'list-plaintiffs',
            'send-back-to-detective',
            'attorney-accept',
            'assign-attorney'

        ]);
        $admin_detective->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'create-document',
            'view-case',
            'list-detectives',
            'send-to-attorney',
            'assign-detective'
        ]);

    }
}