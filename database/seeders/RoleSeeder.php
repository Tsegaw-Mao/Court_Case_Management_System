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
            'reject-request'
        ]);

        $judge->givePermissionTo([
            'approve-request',
            'reject-request',
            'view-document',
            'view-role',
            'view-user',
            'view-document',
            'view-case'
        ]);

        $attorney->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'view-role',
            'view-user',
            'view-document',
            'view-case'
        ]);
        $detective->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'view-role',
            'view-user',
            'view-document',
            'view-case'
        ]);
        $clerk->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'view-user',
            'create-case',
            'edit-case',
            'delete-case',
            'view-case',
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
            'view-role',
            'view-user',
            'view-document',
            'view-case',
            'assign-user'
        ]);
        $admin_attorney->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'view-role',
            'view-user',
            'view-document',
            'assign-user',
            'view-case'
        ]);
        $admin_detective->givePermissionTo([
            'edit-document',
            'delete-document',
            'view-document',
            'view-role',
            'view-user',
            'view-document',
            'assign-user',
            'view-case'
        ]);

    }
}