<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $permissions = [
            'view_any_users',
            'view_users',
            'create_users',
            'update_users',
            'delete_users',
            'change_password',
            'view_any_role',
            'view_role',
            'create_role',
            'update_role',
            'delete_role',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        $role = Role::create([
            'name' => 'Human Resource Manager',
        ]);

        $role->permissions()->attach(Permission::all()->pluck('id'));

        $user = User::create([
            'username' => 'raphaeldanu',
            'password' => Hash::make('12345678'),
            'role_id' => $role->id,
        ]);

    }
}
