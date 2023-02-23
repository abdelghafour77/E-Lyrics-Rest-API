<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Str;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Permissions
        Permission::create(['name' => 'view artists']);
        Permission::create(['name' => 'create artists']);
        Permission::create(['name' => 'edit artists']);
        Permission::create(['name' => 'delete artists']);

        Permission::create(['name' => 'view albums']);
        Permission::create(['name' => 'create albums']);
        Permission::create(['name' => 'edit albums']);
        Permission::create(['name' => 'delete albums']);

        Permission::create(['name' => 'view lyrics']);
        Permission::create(['name' => 'create lyrics']);
        Permission::create(['name' => 'edit lyrics']);
        Permission::create(['name' => 'delete lyrics']);

        Permission::create(['name' => 'view songs']);
        Permission::create(['name' => 'create songs']);
        Permission::create(['name' => 'edit songs']);
        Permission::create(['name' => 'delete songs']);

        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $moderatorRole = Role::create(['name' => 'moderator']);
        $userRole = Role::create(['name' => 'user']);

        // Assign Permissions to Roles
        $adminRole->syncPermissions(Permission::all());
        $moderatorRole->syncPermissions(['view artists', 'create artists', 'edit artists', 'delete artists',
                                        'view albums', 'create albums', 'edit albums', 'delete albums',
                                        'view lyrics', 'create lyrics', 'edit lyrics', 'delete lyrics',
                                        'view songs', 'create songs', 'edit songs', 'delete songs',]);
        $userRole->syncPermissions(['view artists','view albums', 'view lyrics', 'view songs',]);
    }
}
