@extends('staff.layouts.app')

@section('title', 'Edit Hibah')

@section('header', 'Edit Hibah')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Edit Hibah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('s_hibah.pengaturan.update', $hibah->id) }}"
                            enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Judul Hibah<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_judul" class="form-control" placeholder=""
                                            value="{{ $hibah->hibah_judul }}" required>
                                        <span class="invalid-feedback">
                                            Form isian Judul dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Kategori Hibah<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="hibah_kategori" class="form-control select2" style="width: 100%;"
                                            required>
                                            <option value="">-</option>
                                            <option value="7" {{ $hibah->hibah_kategori_id == 7 ? 'selected' : '' }}>
                                                Penelitian</option>
                                            <option value="8" {{ $hibah->hibah_kategori_id == 8 ? 'selected' : '' }}>
                                                Pengabdian</option>
                                            <option value="9" {{ $hibah->hibah_kategori_id == 9 ? 'selected' : '' }}>
                                                Publikasi</option>
                                            <option value="10" {{ $hibah->hibah_kategori_id == 10 ? 'selected' : '' }}>
                                                Pendidikan</option>
                                        </select>
                                        <span class="invalid-feedback">
                                            Form isian Kategori dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Publish<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_publish" class="form-control datetimepicker"
                                            placeholder="" value="{{ $hibah->hibah_tgl_publish }}" required>
                                        <span class="invalid-feedback">
                                            Form isian Tanggal Publish dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_mulai" class="form-control datetimepicker"
                                            placeholder="" value="{{ $hibah->hibah_tgl_mulai }}" required>
                                        <span class="invalid-feedback">
                                            Form isian Tanggal Mulai dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Selesai<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_selesai" class="form-control datetimepicker"
                                            placeholder="" value="{{ $hibah->hibah_tgl_selesai }}" required>
                                        <span class="invalid-feedback">
                                            Form isian Tanggal Selesai dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Mulai Tahap Laporan Kemajuan</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_mulai_laporankemajuan"
                                            class="form-control datetimepicker" placeholder=""
                                            value="{{ $hibah->hibah_tgl_mulai_laporankemajuan }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Selesai Tahap Laporan Kemajuan</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_selesai_laporankemajuan"
                                            class="form-control datetimepicker" placeholder=""
                                            value="{{ $hibah->hibah_tgl_selesai_laporankemajuan }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Mulai Tahap Laporan Final</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_mulai_laporanfinal"
                                            class="form-control datetimepicker" placeholder=""
                                            value="{{ $hibah->hibah_tgl_mulai_laporanfinal }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Selesai Tahap Laporan Final</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_selesai_laporanfinal"
                                            class="form-control datetimepicker" placeholder=""
                                            value="{{ $hibah->hibah_tgl_selesai_laporanfinal }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Pengumuman<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_pengumuman"
                                            class="form-control datetimepicker" placeholder=""
                                            value="{{ $hibah->hibah_tgl_pengumuman }}" required>
                                        <span class="invalid-feedback">
                                            Form isian Tanggal Pengumuman dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Unit<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="hibah_unit_id" class="form-control select2" style="width: 100%;"
                                            required>
                                            <option value="">-</option>
                                            <option value='67' {{ $hibah->unit_id == 67 ? 'selected' : ''  }}>Fakultas
                                                Biologi</option>
                                            <option value='69' {{ $hibah->unit_id == 69 ? 'selected' : ''  }}>Fakultas
                                                Farmasi</option>
                                            <option value='70' {{ $hibah->unit_id == 70 ? 'selected' : ''  }}>Fakultas
                                                Filsafat</option>
                                            <option value='71' {{ $hibah->unit_id == 71 ? 'selected' : ''  }}>Fakultas
                                                Geografi</option>
                                            <option value='72' {{ $hibah->unit_id == 72 ? 'selected' : ''  }}>Fakultas
                                                Hukum</option>
                                            <option value='73' {{ $hibah->unit_id == 73 ? 'selected' : ''  }}>Fakultas
                                                Ilmu Sosial dan Ilmu Politik</option>
                                            <option value='74' {{ $hibah->unit_id == 74 ? 'selected' : ''  }}>Fakultas
                                                Kedokteran</option>
                                            <option value='75' {{ $hibah->unit_id == 75 ? 'selected' : ''  }}>Fakultas
                                                Kedokteran Gigi</option>
                                            <option value='76' {{ $hibah->unit_id == 76 ? 'selected' : ''  }}>Fakultas
                                                Kedokteran Hewan</option>
                                            <option value='77' {{ $hibah->unit_id == 77 ? 'selected' : ''  }}>Fakultas
                                                Kehutanan</option>
                                            <option value='78' {{ $hibah->unit_id == 78 ? 'selected' : ''  }}>Fakultas
                                                Matematika dan Ilmu Pengetahuan Alam</option>
                                            <option value='79' {{ $hibah->unit_id == 79 ? 'selected' : ''  }}>Fakultas
                                                Pertanian</option>
                                            <option value='80' {{ $hibah->unit_id == 80 ? 'selected' : ''  }}>Fakultas
                                                Peternakan</option>
                                            <option value='81' {{ $hibah->unit_id == 81 ? 'selected' : ''  }}>Fakultas
                                                Psikologi</option>
                                            <option value='83' {{ $hibah->unit_id == 83 ? 'selected' : ''  }}>Fakultas
                                                Teknik</option>
                                            <option value='84' {{ $hibah->unit_id == 84 ? 'selected' : ''  }}>Fakultas
                                                Teknologi Pertanian</option>
                                            <option value='85' {{ $hibah->unit_id == 85 ? 'selected' : ''  }}>Fakultas
                                                Ilmu Budaya</option>
                                            <option value='86' {{ $hibah->unit_id == 86 ? 'selected' : ''  }}>Direktorat
                                                Keuangan</option>
                                            <option value='88' {{ $hibah->unit_id == 88 ? 'selected' : ''  }}>Direktorat
                                                Sumber Daya Manusia</option>
                                            <option value='90' {{ $hibah->unit_id == 90 ? 'selected' : ''  }}>Direktorat
                                                Perencanaan dan Pengembangan</option>
                                            <option value='91' {{ $hibah->unit_id == 91 ? 'selected' : ''  }}>Direktorat
                                                Kemahasiswaan</option>
                                            <option value='92' {{ $hibah->unit_id == 92 ? 'selected' : ''  }}>Fakultas
                                                Ekonomika dan Bisnis</option>
                                            <option value='94' {{ $hibah->unit_id == 94 ? 'selected' : ''  }}>
                                                Perpustakaan</option>
                                            <option value='95' {{ $hibah->unit_id == 95 ? 'selected' : ''  }}>Arsip
                                                Universitas</option>
                                            <option value='96' {{ $hibah->unit_id == 96 ? 'selected' : ''  }}>Sekolah
                                                Pascasarjana</option>
                                            <option value='102' {{ $hibah->unit_id == 102 ? 'selected' : ''  }}>
                                                KORPAGAMA</option>
                                            <option value='106' {{ $hibah->unit_id == 106 ? 'selected' : ''  }}>
                                                Laboratorium Penelitian dan Pengujian Terpadu (LPPT)</option>
                                            <option value='109' {{ $hibah->unit_id == 109 ? 'selected' : ''  }}>Kantor
                                                Jaminan Mutu</option>
                                            <option value='111' {{ $hibah->unit_id == 111 ? 'selected' : ''  }}>Sekolah
                                                Vokasi</option>
                                            <option value='112' {{ $hibah->unit_id == 112 ? 'selected' : ''  }}>Bagian
                                                Tata Usaha dan Rumah Tangga</option>
                                            <option value='113' {{ $hibah->unit_id == 113 ? 'selected' : ''  }}>Grha
                                                Sabha Pramana</option>
                                            <option value='116' {{ $hibah->unit_id == 116 ? 'selected' : ''  }}>Pusat
                                                Studi Pangan dan Gizi</option>
                                            <option value='117' {{ $hibah->unit_id == 117 ? 'selected' : ''  }}>Pusat
                                                Studi Bioteknologi</option>
                                            <option value='118' {{ $hibah->unit_id == 118 ? 'selected' : ''  }}>Pusat
                                                Studi Kependudukan dan Kebijakan</option>
                                            <option value='119' {{ $hibah->unit_id == 119 ? 'selected' : ''  }}>Pusat
                                                Studi Lingkungan Hidup</option>
                                            <option value='120' {{ $hibah->unit_id == 120 ? 'selected' : ''  }}>Pusat
                                                Studi Pariwisata</option>
                                            <option value='121' {{ $hibah->unit_id == 121 ? 'selected' : ''  }}>Pusat
                                                Studi Farmakologi Klinik dan Kebijakan Obat</option>
                                            <option value='122' {{ $hibah->unit_id == 122 ? 'selected' : ''  }}>Pusat
                                                Studi Pedesaan dan Kawasan</option>
                                            <option value='123' {{ $hibah->unit_id == 123 ? 'selected' : ''  }}>Pusat
                                                Studi Asia Pasifik</option>
                                            <option value='124' {{ $hibah->unit_id == 124 ? 'selected' : ''  }}>Pusat
                                                Studi Wanita</option>
                                            <option value='125' {{ $hibah->unit_id == 125 ? 'selected' : ''  }}>Pusat
                                                Studi Pancasila</option>
                                            <option value='126' {{ $hibah->unit_id == 126 ? 'selected' : ''  }}>Pusat
                                                Studi Sumberdaya dan Teknologi Kelautan</option>
                                            <option value='127' {{ $hibah->unit_id == 127 ? 'selected' : ''  }}>Pusat
                                                Studi Energi</option>
                                            <option value='128' {{ $hibah->unit_id == 128 ? 'selected' : ''  }}>Pusat
                                                Studi Transportasi dan Logistik</option>
                                            <option value='129' {{ $hibah->unit_id == 129 ? 'selected' : ''  }}>Pusat
                                                Studi Ekonomi dan Kebijakan Publik</option>
                                            <option value='130' {{ $hibah->unit_id == 130 ? 'selected' : ''  }}>Pusat
                                                Studi Bencana</option>
                                            <option value='131' {{ $hibah->unit_id == 131 ? 'selected' : ''  }}>Pusat
                                                Studi Ilmu Teknik</option>
                                            <option value='132' {{ $hibah->unit_id == 132 ? 'selected' : ''  }}>Pusat
                                                Studi Sosial Asia Tenggara</option>
                                            <option value='133' {{ $hibah->unit_id == 133 ? 'selected' : ''  }}>Pusat
                                                Studi Ekonomi Kerakyatan (PUSTEK)</option>
                                            <option value='135' {{ $hibah->unit_id == 135 ? 'selected' : ''  }}>Pusat
                                                Studi Perencanaan Pembangunan Regional</option>
                                            <option value='136' {{ $hibah->unit_id == 136 ? 'selected' : ''  }}>Pusat
                                                Studi Korea</option>
                                            <option value='142' {{ $hibah->unit_id == 142 ? 'selected' : ''  }}>UGM
                                                Residence</option>
                                            <option value='143' {{ $hibah->unit_id == 143 ? 'selected' : ''  }}>Pusat
                                                Studi Keamanan dan Perdamaian</option>
                                            <option value='144' {{ $hibah->unit_id == 144 ? 'selected' : ''  }}>Pusat
                                                Studi Agroekologi</option>
                                            <option value='145' {{ $hibah->unit_id == 145 ? 'selected' : ''  }}>Pusat
                                                Studi Jerman</option>
                                            <option value='146' {{ $hibah->unit_id == 146 ? 'selected' : ''  }}>Pusat
                                                Studi Kebudayaan</option>
                                            <option value='147' {{ $hibah->unit_id == 147 ? 'selected' : ''  }}>Pusat
                                                Studi Sumber Daya Lahan</option>
                                            <option value='148' {{ $hibah->unit_id == 148 ? 'selected' : ''  }}>Pusat
                                                Studi Jepang</option>
                                            <option value='149' {{ $hibah->unit_id == 149 ? 'selected' : ''  }}>Pusat
                                                Studi Pengelolaan Sumber Daya Hayati</option>
                                            <option value='151' {{ $hibah->unit_id == 151 ? 'selected' : ''  }}>Rumah
                                                Sakit Akademik</option>
                                            <option value='152' {{ $hibah->unit_id == 152 ? 'selected' : ''  }}>UPT
                                                Percetakan dan Penerbitan UGM (GAMA PRESS)</option>
                                            <option value='157' {{ $hibah->unit_id == 157 ? 'selected' : ''  }}>Pusat
                                                Kebudayaan Koesnadi Hardjasoemantri</option>
                                            <option value='159' {{ $hibah->unit_id == 159 ? 'selected' : ''  }}>Pusat
                                                Studi Perdagangan Dunia</option>
                                            <option value='160' {{ $hibah->unit_id == 160 ? 'selected' : ''  }}>Majelis
                                                Wali Amanat</option>
                                            <option value='161' {{ $hibah->unit_id == 161 ? 'selected' : ''  }}>Wisma MM
                                            </option>
                                            <option value='162' {{ $hibah->unit_id == 162 ? 'selected' : ''  }}>Senat
                                                Akademik Universitas</option>
                                            <option value='164' {{ $hibah->unit_id == 164 ? 'selected' : ''  }}>
                                                Direktorat Pengembangan Usaha dan Inkubasi</option>
                                            <option value='167' {{ $hibah->unit_id == 167 ? 'selected' : ''  }}>Unit
                                                Pengadaan</option>
                                            <option value='168' {{ $hibah->unit_id == 168 ? 'selected' : ''  }}>UGM
                                                Kampus Jakarta</option>
                                            <option value='169' {{ $hibah->unit_id == 169 ? 'selected' : ''  }}>MSi
                                                (Magister Sains dan Doktor) FEB</option>
                                            <option value='170' {{ $hibah->unit_id == 170 ? 'selected' : ''  }}>MM
                                                Kampus Yogyakarta</option>
                                            <option value='171' {{ $hibah->unit_id == 171 ? 'selected' : ''  }}>MM
                                                Kampus Jakarta</option>
                                            <option value='172' {{ $hibah->unit_id == 172 ? 'selected' : ''  }}>Magister
                                                Ekonomika Pembangunan (MEP) FEB</option>
                                            <option value='173' {{ $hibah->unit_id == 173 ? 'selected' : ''  }}>Magister
                                                Akuntansi (MAKSI) FEB</option>
                                            <option value='174' {{ $hibah->unit_id == 174 ? 'selected' : ''  }}>
                                                Penelitian dan Pelatihan Ekonomika dan Bisnis (P2EB) FEB</option>
                                            <option value='175' {{ $hibah->unit_id == 175 ? 'selected' : ''  }}>
                                                Pendidikan Profesi Akuntansi (PPAK) FEB</option>
                                            <option value='176' {{ $hibah->unit_id == 176 ? 'selected' : ''  }}>Kantor
                                                Audit Internal</option>
                                            <option value='179' {{ $hibah->unit_id == 179 ? 'selected' : ''  }}>Kantor
                                                Hukum dan Organisasi</option>
                                            <option value='200' {{ $hibah->unit_id == 200 ? 'selected' : ''  }}>Dewan
                                                Audit</option>
                                            <option value='203' {{ $hibah->unit_id == 203 ? 'selected' : ''  }}>
                                                Direktorat Pendidikan dan Pengajaran</option>
                                            <option value='204' {{ $hibah->unit_id == 204 ? 'selected' : ''  }}>
                                                Direktorat Penelitian</option>
                                            <option value='205' {{ $hibah->unit_id == 205 ? 'selected' : ''  }}>
                                                Direktorat Pengabdian kepada Masyarakat</option>
                                            <option value='206' {{ $hibah->unit_id == 206 ? 'selected' : ''  }}>
                                                Direktorat Sistem dan Sumber Daya Informasi</option>
                                            <option value='209' {{ $hibah->unit_id == 209 ? 'selected' : ''  }}>Badan
                                                Penerbit dan Publikasi</option>
                                            <option value='212' {{ $hibah->unit_id == 212 ? 'selected' : ''  }}>Pusat
                                                Pengadaan dan Logistik</option>
                                            <option value='213' {{ $hibah->unit_id == 213 ? 'selected' : ''  }}>Pusat
                                                Inovasi dan Kajian Akademik</option>
                                            <option value='214' {{ $hibah->unit_id == 214 ? 'selected' : ''  }}>
                                                Direktorat Aset</option>
                                            <option value='215' {{ $hibah->unit_id == 215 ? 'selected' : ''  }}>Dewan
                                                Guru Besar</option>
                                            <option value='217' {{ $hibah->unit_id == 217 ? 'selected' : ''  }}>
                                                Direktorat Kemitraan, Alumni, dan Urusan Internasional</option>
                                            <option value='219' {{ $hibah->unit_id == 219 ? 'selected' : ''  }}>Rumah
                                                Sakit</option>
                                            <option value='220' {{ $hibah->unit_id == 220 ? 'selected' : ''  }}>Pusat
                                                Inovasi Agroteknologi</option>
                                            <option value='221' {{ $hibah->unit_id == 221 ? 'selected' : ''  }}>
                                                Sekretariat Universitas</option>
                                            <option value='222' {{ $hibah->unit_id == 222 ? 'selected' : ''  }}>
                                                Sekretaris Eksekutif</option>
                                            <option value='223' {{ $hibah->unit_id == 223 ? 'selected' : ''  }}>Bagian
                                                Hubungan Masyarakat dan Protokol</option>
                                            <option value='224' {{ $hibah->unit_id == 224 ? 'selected' : ''  }}>Bagian
                                                Hubungan Kelembagaan</option>
                                            <option value='225' {{ $hibah->unit_id == 225 ? 'selected' : ''  }}>Pusat
                                                Keamanan, Keselamatan, Kesehatan Kerja dan Lingkungan</option>
                                            <option value='226' {{ $hibah->unit_id == 226 ? 'selected' : ''  }}>
                                                Direktorat Perencanaan</option>
                                            <option value='230' {{ $hibah->unit_id == 230 ? 'selected' : ''  }}>Gadjah
                                                Mada Medical Center</option>
                                            <option value='232' {{ $hibah->unit_id == 232 ? 'selected' : ''  }}>Rumah
                                                Sakit Gigi dan Mulut Universitas Gadjah Mada Prof. Soedomo</option>
                                            <option value='234' {{ $hibah->unit_id == 234 ? 'selected' : ''  }}>Fakultas
                                                Kedokteran, Kesehatan Masyarakat, dan Keperawatan</option>
                                        </select>
                                        <span class="invalid-feedback">
                                            Form isian Unit dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Panduan<span class="text-danger"></span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="#" class="form-control-file">{{ $hibah->hibah_panduan }}</a><br>
                                        <input type="file" name="hibah_panduan" class="form-control-file">
                                        <span class="invalid-feedback">
                                            Form Upload Panduan belum di pilih.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right"></div>
                                    <div class="col-md-9 text-left">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                            Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-bullhorn"></i> Petunjuk Pengisian</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Tanda <span class="text-danger">*</span> menunjukkan bahwa kolom / field tersebut wajib
                                diisi. </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endpush
@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    });
    $(document).ready(function($) {
        if (window.$().datetimepicker) {
            $('.datetimepicker').datetimepicker({
                // Formats
                // follow MomentJS docs: https://momentjs.com/docs/#/displaying/format/
                format: 'YYYY-MM-DD HH:mm',

                // Your Icons
                // as Bootstrap 4 is not using Glyphicons anymore
                icons: {
                    time: 'fas fa-clock',
                    date: 'fas fa-calendar',
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-check',
                    clear: 'fas fa-trash',
                    close: 'fas fa-times'
                }
            });
        }
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
</script>
@endpush
