<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Level;
use App\Models\Department;
use App\Models\Permission;
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
            'view_any_departments',
            'view_department',
            'create_department',
            'update_department',
            'delete_department',
            'view_any_positions',
            'view_position',
            'create_position',
            'update_position',
            'delete_position',
            'view_any_levels',
            'view_level',
            'create_level',
            'update_level',
            'delete_level',
            'view_any_salary_ranges',
            'view_salary_range',
            'create_salary_range',
            'update_salary_range',
            'delete_salary_range',
            'view_any_employees',
            'view_employee',
            'create_employee',
            'update_employee',
            'delete_employee',
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

        $departments = [
            'Admin & General',
            'Front Office',
            'Housekeeping',
            'Food & Beverage Product',
            'Food & Beverage Service',
            'Engineering',
            'Human Resource',
            'Marketing',
            'Accounting',
        ];

        foreach ($departments as $value) {
            Department::create([
                'name' => $value
            ]);
        }

        $levels = [
            'Daily Worker',
            'Rank and File 1',
            'Rank and File 2',
            'Supervisor 1',
            'Supervisor 2',
            'Manager 1',
            'Manager 2',
            'Excecutive'
        ];

        foreach ($levels as $value) {
            Level::create([
                'name' => $value
            ]);
        }
    }
}
