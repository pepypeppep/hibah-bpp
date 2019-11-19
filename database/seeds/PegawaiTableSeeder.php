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
        $pegawais = [
            [
                'unit_id' => 70,
                'NIP' => '123',
                'name' => 'Riskita Sari',
                'email' => 'riskita@ugm.ac.id',
                'password' => bcrypt(12345),
                'staff' => 2,
                'mahasiswa' => 1,
            ],
            [
                'unit_id' => 70,
                'NIP' => '456',
                'name' => 'Rangga Kala',
                'email' => 'rangga@ugm.ac.id',
                'password' => bcrypt(12345),
                'staff' => 2,
                'mahasiswa' => 1,
            ],
            [
                'unit_id' => 74,
                'NIP' => '789',
                'name' => 'BPP UGM',
                'email' => 'bpp@ugm.ac.id',
                'password' => bcrypt(12345),
                'staff' => 2,
                'mahasiswa' => 1,
            ],
        ];

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

        $user->assignRole(Role::where('name', 'reviewer')->first()->id);

        // Dummy Member
        $user = [
            'unit_id' => 51,
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
