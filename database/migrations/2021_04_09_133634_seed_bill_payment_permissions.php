<?php

use Illuminate\Database\Migrations\Migration;

class SeedBillPaymentPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            config('permission.permissions.read_bill_payments'),
            config('permission.permissions.create_bill_payments'),
            config('permission.permissions.update_bill_payments'),
            config('permission.permissions.delete_bill_payments'),
            config('permission.permissions.confirm_bill_payments'),
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
