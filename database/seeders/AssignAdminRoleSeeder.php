<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignAdminRoleSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1); // Replace with the correct user ID
        $role = Role::where('name', 'Admin')->first();
        
        if ($user && $role) {
            $user->assignRole($role);
            echo "Admin role assigned to user\n";
        } else {
            echo "Error: Admin role or user not found.\n";
        }
    }
}