<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

/**
 * Class RolesTableSeeder
 */
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Admin',
            'description'   => 'System admin, Complete system control',
            'color'         => 'green',
        ]);

        Role::create([
            'name'          => 'CEO',
            'description'   => 'CEO Description',
            'color'         => 'red',
        ]);
    }
}