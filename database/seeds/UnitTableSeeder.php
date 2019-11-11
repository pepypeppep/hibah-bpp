<?php

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [ 'id' => '67', 'nama' => 'Fakultas Biologi' ],
            [ 'id' => '69', 'nama' => 'Fakultas Farmasi' ],
            [ 'id' => '70', 'nama' => 'Fakultas Filsafat' ],
            [ 'id' => '71', 'nama' => 'Fakultas Geografi' ],
            [ 'id' => '72', 'nama' => 'Fakultas Hukum' ],
            [ 'id' => '73', 'nama' => 'Fakultas Ilmu Sosial dan Ilmu Politik' ],
            [ 'id' => '74', 'nama' => 'Fakultas Kedokteran' ],
            [ 'id' => '75', 'nama' => 'Fakultas Kedokteran Gigi' ],
            [ 'id' => '76', 'nama' => 'Fakultas Kedokteran Hewan' ],
            [ 'id' => '77', 'nama' => 'Fakultas Kehutanan' ],
            [ 'id' => '78', 'nama' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam' ],
            [ 'id' => '79', 'nama' => 'Fakultas Pertanian' ],
            [ 'id' => '80', 'nama' => 'Fakultas Peternakan' ],
            [ 'id' => '81', 'nama' => 'Fakultas Psikologi' ],
            [ 'id' => '83', 'nama' => 'Fakultas Teknik' ],
            [ 'id' => '84', 'nama' => 'Fakultas Teknologi Pertanian' ],
            [ 'id' => '85', 'nama' => 'Fakultas Ilmu Budaya' ],
            [ 'id' => '86', 'nama' => 'Direktorat Keuangan' ],
            [ 'id' => '88', 'nama' => 'Direktorat Sumber Daya Manusia' ],
            [ 'id' => '90', 'nama' => 'Direktorat Perencanaan dan Pengembangan' ],
            [ 'id' => '91', 'nama' => 'Direktorat Kemahasiswaan' ],
            [ 'id' => '92', 'nama' => 'Fakultas Ekonomika dan Bisnis' ],
            [ 'id' => '94', 'nama' => 'Perpustakaan' ],
            [ 'id' => '95', 'nama' => 'Arsip Universitas' ],
            [ 'id' => '96', 'nama' => 'Sekolah Pascasarjana' ],
            [ 'id' => '102', 'nama' => 'KORPAGAMA' ],
            [ 'id' => '106', 'nama' => 'Laboratorium Penelitian dan Pengujian Terpadu (LPPT)' ],
            [ 'id' => '109', 'nama' => 'Kantor Jaminan Mutu' ],
            [ 'id' => '111', 'nama' => 'Sekolah Vokasi' ],
            [ 'id' => '112', 'nama' => 'Bagian Tata Usaha dan Rumah Tangga' ],
            [ 'id' => '113', 'nama' => 'Grha Sabha Pramana' ],
            [ 'id' => '116', 'nama' => 'Pusat Studi Pangan dan Gizi' ],
            [ 'id' => '117', 'nama' => 'Pusat Studi Bioteknologi' ],
            [ 'id' => '118', 'nama' => 'Pusat Studi Kependudukan dan Kebijakan' ],
            [ 'id' => '119', 'nama' => 'Pusat Studi Lingkungan Hidup' ],
            [ 'id' => '120', 'nama' => 'Pusat Studi Pariwisata' ],
            [ 'id' => '121', 'nama' => 'Pusat Studi Farmakologi Klinik dan Kebijakan Obat' ],
            [ 'id' => '122', 'nama' => 'Pusat Studi Pedesaan dan Kawasan' ],
            [ 'id' => '123', 'nama' => 'Pusat Studi Asia Pasifik' ],
            [ 'id' => '124', 'nama' => 'Pusat Studi Wanita' ],
            [ 'id' => '125', 'nama' => 'Pusat Studi Pancasila' ],
            [ 'id' => '126', 'nama' => 'Pusat Studi Sumberdaya dan Teknologi Kelautan' ],
            [ 'id' => '127', 'nama' => 'Pusat Studi Energi' ],
            [ 'id' => '128', 'nama' => 'Pusat Studi Transportasi dan Logistik' ],
            [ 'id' => '129', 'nama' => 'Pusat Studi Ekonomi dan Kebijakan Publik' ],
            [ 'id' => '130', 'nama' => 'Pusat Studi Bencana' ],
            [ 'id' => '131', 'nama' => 'Pusat Studi Ilmu Teknik' ],
            [ 'id' => '132', 'nama' => 'Pusat Studi Sosial Asia Tenggara' ],
            [ 'id' => '133', 'nama' => 'Pusat Studi Ekonomi Kerakyatan (PUSTEK)' ],
            [ 'id' => '135', 'nama' => 'Pusat Studi Perencanaan Pembangunan Regional' ],
            [ 'id' => '136', 'nama' => 'Pusat Studi Korea' ],
            [ 'id' => '142', 'nama' => 'UGM Residence' ],
            [ 'id' => '143', 'nama' => 'Pusat Studi Keamanan dan Perdamaian' ],
            [ 'id' => '144', 'nama' => 'Pusat Studi Agroekologi' ],
            [ 'id' => '145', 'nama' => 'Pusat Studi Jerman' ],
            [ 'id' => '146', 'nama' => 'Pusat Studi Kebudayaan' ],
            [ 'id' => '147', 'nama' => 'Pusat Studi Sumber Daya Lahan' ],
            [ 'id' => '148', 'nama' => 'Pusat Studi Jepang' ],
            [ 'id' => '149', 'nama' => 'Pusat Studi Pengelolaan Sumber Daya Hayati' ],
            [ 'id' => '151', 'nama' => 'Rumah Sakit Akademik' ],
            [ 'id' => '152', 'nama' => 'UPT Percetakan dan Penerbitan UGM (GAMA PRESS)' ],
            [ 'id' => '157', 'nama' => 'Pusat Kebudayaan Koesnadi Hardjasoemantri' ],
            [ 'id' => '159', 'nama' => 'Pusat Studi Perdagangan Dunia' ],
            [ 'id' => '160', 'nama' => 'Majelis Wali Amanat' ],
            [ 'id' => '161', 'nama' => 'Wisma MM' ],
            [ 'id' => '162', 'nama' => 'Senat Akademik Universitas' ],
            [ 'id' => '164', 'nama' => 'Direktorat Pengembangan Usaha dan Inkubasi' ],
            [ 'id' => '167', 'nama' => 'Unit Pengadaan' ],
            [ 'id' => '168', 'nama' => 'UGM Kampus Jakarta' ],
            [ 'id' => '169', 'nama' => 'MSi (Magister Sains dan Doktor) FEB' ],
            [ 'id' => '170', 'nama' => 'MM Kampus Yogyakarta' ],
            [ 'id' => '171', 'nama' => 'MM Kampus Jakarta' ],
            [ 'id' => '172', 'nama' => 'Magister Ekonomika Pembangunan (MEP) FEB' ],
            [ 'id' => '173', 'nama' => 'Magister Akuntansi (MAKSI) FEB' ],
            [ 'id' => '174', 'nama' => 'Penelitian dan Pelatihan Ekonomika dan Bisnis (P2EB) FEB' ],
            [ 'id' => '175', 'nama' => 'Pendidikan Profesi Akuntansi (PPAK) FEB' ],
            [ 'id' => '176', 'nama' => 'Kantor Audit Internal' ],
            [ 'id' => '179', 'nama' => 'Kantor Hukum dan Organisasi' ],
            [ 'id' => '200', 'nama' => 'Dewan Audit' ],
            [ 'id' => '203', 'nama' => 'Direktorat Pendidikan dan Pengajaran' ],
            [ 'id' => '204', 'nama' => 'Direktorat Penelitian' ],
            [ 'id' => '205', 'nama' => 'Direktorat Pengabdian kepada Masyarakat' ],
            [ 'id' => '206', 'nama' => 'Direktorat Sistem dan Sumber Daya Informasi' ],
            [ 'id' => '209', 'nama' => 'Badan Penerbit dan Publikasi' ],
            [ 'id' => '212', 'nama' => 'Pusat Pengadaan dan Logistik' ],
            [ 'id' => '213', 'nama' => 'Pusat Inovasi dan Kajian Akademik' ],
            [ 'id' => '214', 'nama' => 'Direktorat Aset' ],
            [ 'id' => '215', 'nama' => 'Dewan Guru Besar' ],
            [ 'id' => '217', 'nama' => 'Direktorat Kemitraan, Alumni, dan Urusan Internasional' ],
            [ 'id' => '219', 'nama' => 'Rumah Sakit' ],
            [ 'id' => '220', 'nama' => 'Pusat Inovasi Agroteknologi' ],
            [ 'id' => '221', 'nama' => 'Sekretariat Universitas' ],
            [ 'id' => '222', 'nama' => 'Sekretaris Eksekutif' ],
            [ 'id' => '223', 'nama' => 'Bagian Hubungan Masyarakat dan Protokol' ],
            [ 'id' => '224', 'nama' => 'Bagian Hubungan Kelembagaan' ],
            [ 'id' => '225', 'nama' => 'Pusat Keamanan, Keselamatan, Kesehatan Kerja dan Lingkungan' ],
            [ 'id' => '226', 'nama' => 'Direktorat Perencanaan' ],
            [ 'id' => '230', 'nama' => 'Gadjah Mada Medical Center' ],
            [ 'id' => '232', 'nama' => 'Rumah Sakit Gigi dan Mulut Universitas Gadjah Mada Prof. Soedomo' ],
            [ 'id' => '234', 'nama' => 'Fakultas Kedokteran, Kesehatan Masyarakat, dan Keperawatan' ],
        ];

        foreach ($units as $key => $value) {
            $data = new Unit;
            $data->id = $value['id'];
            $data->nama = $value['nama'];
            $data->save();
        }
    }
}
