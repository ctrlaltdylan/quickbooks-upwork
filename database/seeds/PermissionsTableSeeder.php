<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;

/**
 * Class RolesTableSeeder
 */
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        
        Permission::create([
            'name'          => 'user_create',
            'description'   => 'Create New User',
        ]);

        Permission::create([
            'name'          => 'client_record_create',
            'description'   => 'Create Client Record',
        ]);

        Permission::create([
            'name'          => 'client_record_edit',
            'description'   => 'Edit Client Record',
        ]);

        Permission::create([
            'name'          => 'client_record_delete',
            'description'   => 'Delete Client Record',
        ]);

        Permission::create([
            'name'          => 'production_view',
            'description'   => 'Production View',
        ]);

        Permission::create([
            'name'          => 'leads_view',
            'description'   => 'Leads View',
        ]);

        Permission::create([
            'name'          => 'estimators_view',
            'description'   => 'Estimators View',
        ]);

        Permission::create([
            'name'          => 'estimators_report',
            'description'   => 'Estimators Report',
        ]);

        Permission::create([
            'name'          => 'leads_report',
            'description'   => 'Leads Report',
        ]);

        Permission::create([
            'name'          => 'follow_up_report',
            'description'   => 'Follow Up Report',
        ]);

        Permission::create([
            'name'          => 'production_reports',
            'description'   => 'Production Reports',
        ]);
    }
}