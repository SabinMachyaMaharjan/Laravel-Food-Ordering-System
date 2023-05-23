<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            ['role' => 'admin'],
            ['role' => 'vendor'],
            ['role' => 'customer']
        ];
        Role::insert($roles);
    }
}
