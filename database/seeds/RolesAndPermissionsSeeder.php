<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        $users_create = Permission::create(['name' => 'create users']);
        $users_read   = Permission::create(['name' => 'read users']);
        $users_update = Permission::create(['name' => 'update users']);
        $users_delete = Permission::create(['name' => 'delete users']);
        $access_page_account_security = Permission::create(['name' => 'access account security page']);

        // create roles
        $role_superadmin = new Role;
        $role_superadmin->name = 'superadmin';
        $role_superadmin->save();

        $superadmin_permissions = [
        ];

        $role_admin = new Role;
        $role_admin->name = 'admin';
        $role_admin->save();

        $admin_permissions = [
            $users_create,
            $users_update,
            $users_delete
        ];

        $role_moderator = new Role;
        $role_moderator->name = 'moderator';
        $role_moderator->save();

        $moderator_permissions = [
            $users_read
        ];

        $role_user_vl1 = new Role;
        $role_user_vl1->name = 'user_vl1';
        $role_user_vl1->save();

        $user_vl1_permissions = [
            $access_page_account_security
        ];

        $role_user = new Role;
        $role_user->name = 'user';
        $role_user->save();

        $user_permissions = [
        ];

        // Assign permissions based on our permission arrays
        // A role gets all the permissions from roles under it.
        foreach ($superadmin_permissions as $permission) {
            $role_superadmin->givePermissionTo($permission);
        }

        foreach ($admin_permissions as $permission) {
            $role_superadmin->givePermissionTo($permission);
            $role_admin->givePermissionTo($permission);
        }

        foreach ($moderator_permissions as $permission) {
            $role_superadmin->givePermissionTo($permission);
            $role_admin->givePermissionTo($permission);
            $role_moderator->givePermissionTo($permission);
        }

        foreach ($user_vl1_permissions as $permission) {
            $role_superadmin->givePermissionTo($permission);
            $role_admin->givePermissionTo($permission);
            $role_moderator->givePermissionTo($permission);
            $role_user_vl1->givePermissionTo($permission);
        }

        foreach ($user_permissions as $permission) {
            $role_superadmin->givePermissionTo($permission);
            $role_admin->givePermissionTo($permission);
            $role_moderator->givePermissionTo($permission);
            $role_user_vl1->givePermissionTo($permission);
            $role_user->givePermissionTo($permission);
        }

        $role_superadmin->save();
        $role_admin->save();
        $role_moderator->save();
        $role_user_vl1->save();
        $role_user->save();
    }
}
