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
            'list-judges'
        ]);

        $attorney->givePermissionTo([
            'view-document',
            'view-case',
            'list-attornies'

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
            'create-user',
            'edit-user',
            'delete-user',
            'view-user',
            'create-role',
            'view-role',
            'edit-role',
            'delete-role',
            'create-case',
            'edit-case',
            'delete-case',
            'view-case',
            'list-judges',
            'list-attornies',
            'list-detectives',
            'list-wittnesses',
            'list-plaintiffs',
            'list-defendants'
        ]);
        $plaintiff->givePermissionTo([
            'view-case',
        ]);
        $defendant->givePermissionTo([
            'view-case',
        ]);
        $admin_judge->givePermissionTo([
            'approve-request',
            'reject-request',
            'view-document',
            'view-case',
            'assign-judge',
            'list-judges',

        ]);
        $admin_attorney->givePermissionTo([
            'assign-attorney',
            'view-document',
            'view-case',
            'list-attornies'

        ]);
        $admin_detective->givePermissionTo([
            'assign-detective',
            'edit-document',
            'delete-document',
            'view-document',
            'create-document',
            'view-case',
            'list-detectives'
        ]);

    }
}