<?php

use App\Models\Pegawai;
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
                'nama' => 'Riskita Sari'
            ],
            [
                'unit_id' => 70,
                'NIP' => '456',
                'nama' => 'Rangga Kala'
            ],
            [
                'unit_id' => 74,
                'NIP' => '789',
                'nama' => 'BPP UGM'
            ],
        ];

        foreach ($pegawais as $key => $value) {
            $data = new Pegawai;
            $data->unit_id = $value['unit_id'];
            $data->NIP = $value['NIP'];
            $data->nama = $value['nama'];
            $data->save();
        }
    }
}
