<?php
namespace Database\Seeders\Auth;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Traits\DisableForeignKeys;

class UserTableSeeder extends Seeder
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

        // Add the master administrator, user id of 1
        User::create([
            'employee_id' => '112212',
            'first_name' => 'John',
            'last_name' =>'Doe',
            'username' => 'john_doe',
            'phone' => '09033068587',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'employee_id' => '112211',
            'first_name' => 'Smith',
            'last_name' => 'Doe',
            'username' => 'smith_doe',
            'phone' => '09033068587',
            'email' => 'user@user.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
        ]);

        $this->enableForeignkeys();
    }
}
