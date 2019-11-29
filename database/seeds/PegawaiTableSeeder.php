<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class PegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dummy Staff
        $user = [
            'unit_id' => 74,
            'NIP' => '789',
            'name' => 'BPP UGM',
            'email' => 'bpp@ugm.ac.id',
            'password' => Hash::make(12345678)
        ];

        $user = User::create($user);

        $user->assignRole(Role::where('name', 'staff')->first()->id);

        // Dummy Reviewer
        $user = [
            'unit_id' => 74,
            'NIP' => '123',
            'name' => 'Prof. Agus',
            'email' => 'agus@ugm.ac.id',
            'password' => Hash::make(12345678)
        ];

        $user = User::create($user);

        $user->assignRole(Role::where('name', 'member')->first()->id);

        // Dummy Member
        $user = [
            'unit_id' => 71,
            'NIP' => '456',
            'name' => 'Riskita Kiky',
            'email' => 'kiky@ugm.ac.id',
            'password' => Hash::make(12345678)
        ];

        $user = User::create($user);

        $user->assignRole(Role::where('name', 'member')->first()->id);

        // Dummy Mahasiswa
        $user = [
            'unit_id' => 85,
            'NIP' => '900',
            'name' => 'Rangga Kala Mahaswa',
            'email' => 'rangga@ugm.ac.id',
            'password' => Hash::make(12345678)
        ];

        $user = User::create($user);

        $user->assignRole(Role::where('name', 'mahasiswa')->first()->id);

    }
}
