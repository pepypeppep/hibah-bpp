<?php

use App\Models\Hibah;
use Illuminate\Database\Seeder;

class HibahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hibahs = [
            [
                'hibah_judul' => 'Example',
                'hibah_kategori_id' => 8,
                'hibah_tgl_publish' => '2019-11-01 00:00:00',
                'hibah_tgl_mulai' => '2019-11-01 00:00:00',
                'hibah_tgl_selesai' => '2019-11-30 00:00:00',
                'hibah_tgl_mulai_laporankemajuan' => null,
                'hibah_tgl_selesai_laporankemajuan' => null,
                'hibah_tgl_mulai_laporanfinal' => null,
                'hibah_tgl_selesai_laporanfinal' => null,
                'hibah_tgl_pengumuman' => '2019-11-11 00:00:00',
                'unit_id' => 70,
                'hibah_panduan' => 'x.pdf',
            ],
        ];

        foreach ($hibahs as $value) {
            $data = new Hibah;
            $data->hibah_judul = $value['hibah_judul'];
            $data->user_id = 1;
            $data->slug = sha1(now());
            $data->hibah_kategori_id = $value['hibah_kategori_id'];
            $data->hibah_tgl_publish = $value['hibah_tgl_publish'];
            $data->hibah_tgl_mulai = $value['hibah_tgl_mulai'];
            $data->hibah_tgl_selesai = $value['hibah_tgl_selesai'];
            $data->hibah_tgl_mulai_laporankemajuan = $value['hibah_tgl_mulai_laporankemajuan'];
            $data->hibah_tgl_selesai_laporankemajuan = $value['hibah_tgl_selesai_laporankemajuan'];
            $data->hibah_tgl_mulai_laporanfinal = $value['hibah_tgl_mulai_laporanfinal'];
            $data->hibah_tgl_selesai_laporanfinal = $value['hibah_tgl_selesai_laporanfinal'];
            $data->hibah_tgl_pengumuman = $value['hibah_tgl_pengumuman'];
            $data->unit_id = $value['unit_id'];
            $data->hibah_panduan = $value['hibah_panduan'];
            $data->save();
        }
    }
}
