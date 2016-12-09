<?php

use Illuminate\Database\Seeder;

use App\Models\User;

/**
 * Class UsersTableSeeder
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        User::create([
            'first_name'    => 'FirstN',
            'last_name'     => 'LastN',
            'username'      => 'admin',
            'email'         => 'admin@admin.admin',
            'password'      => bcrypt('admin'),
            'role_id'       => 1
        ]);
    }
}
