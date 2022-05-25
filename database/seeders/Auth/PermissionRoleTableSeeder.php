<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Database\Seeders\Traits\CreatePermissions;
use Database\Seeders\Traits\DisableForeignKeys;

class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys, CreatePermissions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        collect([
            'Super Administrator',
            'Administrator',
            'Manager',
            'User',
        ])->each(function ($role) {
            Role::firstOrCreate(['name' => $role]);
        });

        $this->generatePermissions();

        $this->enableForeignKeys();
    }
}
