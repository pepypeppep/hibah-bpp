<?php

use App\Models\HibahKategori;
use Illuminate\Database\Seeder;

class HibahKategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 7,
                'nama' => 'Penelitian'
            ],
            [
                'id' => 8,
                'nama' => 'Pengabdian'
            ],
            [
                'id' => 9,
                'nama' => 'Publikasi'
            ],
            [
                'id' => 10,
                'nama' => 'Pendidikan'
            ],
        ];

        foreach ($categories as $key => $value) {
            $data = new HibahKategori;
            $data->id = $value['id'];
            $data->nama = $value['nama'];
            $data->save();
        }
    }
}
