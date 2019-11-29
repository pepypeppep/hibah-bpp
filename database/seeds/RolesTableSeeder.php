<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'staff',
                'guard_name' => 'web',
            ],
            [
                'name' => 'member',
                'guard_name' => 'web',
            ],
            [
                'name' => 'mahasiswa',
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            Role::create([
                    'name' => $role['name'],
                    'guard_name' => $role['guard_name']
                ]);
        }
    }
}
