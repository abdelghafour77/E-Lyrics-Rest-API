<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create artists']);
        Permission::create(['name' => 'read artists']);
        Permission::create(['name' => 'edit artists']);
        Permission::create(['name' => 'delete artists']);
        Permission::create(['name' => 'publish artists']);
        Permission::create(['name' => 'unpublish artists']);

        // create roles and assign existing permissions
        // $role1 = Role::find("title","user");
        $role1 = Role::where('name', 'user')->first();
        $role1->givePermissionTo('read artists');
        // $role1->givePermissionTo('delete artists');

        // $role2 = Role::find("title","moderator");
        // find where title is moderator
        $role2 = Role::where('name', 'moderator')->first();
        $role2->givePermissionTo('create artists');
        $role2->givePermissionTo('read artists');
        $role2->givePermissionTo('publish artists');
        $role2->givePermissionTo('unpublish artists');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
