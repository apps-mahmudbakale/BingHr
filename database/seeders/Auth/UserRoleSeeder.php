<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;

class UserRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        optional(User::find(1))->assignRole('Super Administrator');
        optional(User::find(2))->assignRole('User');

        $this->enableForeignKeys();
    }
}
