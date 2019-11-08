<?php

use App\User;
use Illuminate\Database\Seeder;

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

        foreach ($pegawais as $key => $value) {
            $data = new User;
            $data->unit_id = $value['unit_id'];
            $data->NIP = $value['NIP'];
            $data->name = $value['name'];
            $data->email = $value['email'];
            $data->password = $value['password'];
            $data->staff = $value['staff'];
            $data->mahasiswa = $value['mahasiswa'];
            $data->save();
        }
    }
}
