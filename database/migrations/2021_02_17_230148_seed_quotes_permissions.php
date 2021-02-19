<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedQuotesPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            config('permission.permissions.create_quotes'),
            config('permission.permissions.read_quotes'),
            config('permission.permissions.update_quotes'),
            config('permission.permissions.delete_quotes'),
            config('permission.permissions.create_inventories'),
            config('permission.permissions.read_inventories'),
            config('permission.permissions.update_inventories'),
            config('permission.permissions.delete_inventories'),
        ];
    
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
    
        $adminRole = \Spatie\Permission\Models\Role::findByName(config('access.users.admin_role'));
    
        $adminRole->givePermissionTo($permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
