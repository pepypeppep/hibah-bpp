<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(HibahTableSeeder::class);
        $this->call(HibahKategoriTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(PegawaiTableSeeder::class);
    }
}
