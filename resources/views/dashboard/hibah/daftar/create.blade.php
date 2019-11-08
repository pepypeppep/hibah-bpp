@extends('dashboard.layouts.app')

@section('title', 'Pengajuan Hibah')

@section('header', 'Pengajuan Hibah')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Filter</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Hibah</label>
                                </div>
                                <div class="col-md-10">
                                    <span>[Publikasi] Bantuan Penulisan Book Chapter Universitas Gadjah Mada Tahun Anggaran 2019 ( Periode Oktober)</span>
                                    <input type="hidden" name="hibah_id" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Unit Penyelenggara</label>
                                </div>
                                <div class="col-md-10">
                                    <span>Badan Penerbit dan Publikasi</span>
                                    <input type="hidden" name="unit_id" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Judul</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Abstrak</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <textarea class="textarea" name="abstrak" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Anggota Pegawai <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <button type="button" data-toggle="modal" data-target="#pegawaiModal" class="btn btn-info btn-sm">Tambah</button>
                                    <table id="table_anggota_pegawai" class="table">
                                        <tr>
                                            <td id="pegawaiNo">1</td>
                                            <td>Jeffri Junianto
                                                <input type="hidden" name="pegawai_id[]" value="id">
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input set_ketua" id="checkKetuaid" onclick="checkKetua()">
                                                    <label class="form-check-label" for="checkKetuaid" onclick="checkKetua()"> Ketua</label>
                                                </div>
                                            </td>
                                            <td>
                                                {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Anggota Mahasiswa</label>
                                </div>
                                <div class="col-md-10">
                                    <a href="#" class="btn btn-info btn-sm">Tambah</a>
                                    <input type="text" name="user_id" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Anggota Non Sivitas UGM</label>
                                </div>
                                <div class="col-md-10">
                                    <a href="#" class="btn btn-info btn-sm">Tambah</a>
                                    <input type="text" name="user_id" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right"></div>
                                <div class="col-md-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="agreement" name="agreement">
                                        <label class="form-check-label" for="agreement">Saya menyetujui syarat dan ketentuan yang berlaku yang telah tertera di panduan.</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right"></div>
                                <div class="col-md-10 text-right">
                                    {{-- <button type="submit" class="btn btn-success">Selanjutnya</button> --}}
                                    <a href="{{ route('hibah.daftar.upload') }}" type="submit" class="btn btn-success">Selanjutnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Petunjuk Pengisian</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Tanda <span class="text-danger">*</span> menunjukkan bahwa kolom / field tersebut wajib diisi. </li>
                            <li>
                                Jika Saudara melakukan <i>Copy/Paste</i> pada bidang abstrak, tandai atau <i>block</i> seluruh teks di bidang abstrak. Klik <b><i>Cleanup Format</i></b> untuk membersihkan <i>format</i> teks.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Modal Pegawai -->
        <div class="modal fade" id="pegawaiModal" tabindex="-1" role="dialog" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pegawaiModalLabel">Cari Anggota Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Unit</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="unit_id" id="pegawai_unit_id" class="form-control select2" style="width: 100%;">
                                                <option value="" {{ request('unit_id') == '' ? 'selected' : ''  }}>Tampilkan
                                                    Semua</option>
                                                <option value='67' {{ request('unit_id') == 67 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Biologi</option>
                                                <option value='69' {{ request('unit_id') == 69 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Farmasi</option>
                                                <option value='70' {{ request('unit_id') == 70 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Filsafat</option>
                                                <option value='71' {{ request('unit_id') == 71 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Geografi</option>
                                                <option value='72' {{ request('unit_id') == 72 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Hukum</option>
                                                <option value='73' {{ request('unit_id') == 73 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Ilmu Sosial dan Ilmu Politik</option>
                                                <option value='74' {{ request('unit_id') == 74 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Kedokteran</option>
                                                <option value='75' {{ request('unit_id') == 75 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Kedokteran Gigi</option>
                                                <option value='76' {{ request('unit_id') == 76 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Kedokteran Hewan</option>
                                                <option value='77' {{ request('unit_id') == 77 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Kehutanan</option>
                                                <option value='78' {{ request('unit_id') == 78 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Matematika dan Ilmu Pengetahuan Alam</option>
                                                <option value='79' {{ request('unit_id') == 79 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Pertanian</option>
                                                <option value='80' {{ request('unit_id') == 80 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Peternakan</option>
                                                <option value='81' {{ request('unit_id') == 81 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Psikologi</option>
                                                <option value='83' {{ request('unit_id') == 83 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Teknik</option>
                                                <option value='84' {{ request('unit_id') == 84 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Teknologi Pertanian</option>
                                                <option value='85' {{ request('unit_id') == 85 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Ilmu Budaya</option>
                                                <option value='86' {{ request('unit_id') == 86 ? 'selected' : ''  }}>
                                                    Direktorat
                                                    Keuangan</option>
                                                <option value='88' {{ request('unit_id') == 88 ? 'selected' : ''  }}>
                                                    Direktorat
                                                    Sumber Daya Manusia</option>
                                                <option value='90' {{ request('unit_id') == 90 ? 'selected' : ''  }}>
                                                    Direktorat
                                                    Perencanaan dan Pengembangan</option>
                                                <option value='91' {{ request('unit_id') == 91 ? 'selected' : ''  }}>
                                                    Direktorat
                                                    Kemahasiswaan</option>
                                                <option value='92' {{ request('unit_id') == 92 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Ekonomika dan Bisnis</option>
                                                <option value='94' {{ request('unit_id') == 94 ? 'selected' : ''  }}>
                                                    Perpustakaan</option>
                                                <option value='95' {{ request('unit_id') == 95 ? 'selected' : ''  }}>Arsip
                                                    Universitas</option>
                                                <option value='96' {{ request('unit_id') == 96 ? 'selected' : ''  }}>Sekolah
                                                    Pascasarjana</option>
                                                <option value='102' {{ request('unit_id') == 102 ? 'selected' : ''  }}>
                                                    KORPAGAMA</option>
                                                <option value='106' {{ request('unit_id') == 106 ? 'selected' : ''  }}>
                                                    Laboratorium Penelitian dan Pengujian Terpadu (LPPT)</option>
                                                <option value='109' {{ request('unit_id') == 109 ? 'selected' : ''  }}>
                                                    Kantor
                                                    Jaminan Mutu</option>
                                                <option value='111' {{ request('unit_id') == 111 ? 'selected' : ''  }}>
                                                    Sekolah
                                                    Vokasi</option>
                                                <option value='112' {{ request('unit_id') == 112 ? 'selected' : ''  }}>
                                                    Bagian
                                                    Tata Usaha dan Rumah Tangga</option>
                                                <option value='113' {{ request('unit_id') == 113 ? 'selected' : ''  }}>Grha
                                                    Sabha Pramana</option>
                                                <option value='116' {{ request('unit_id') == 116 ? 'selected' : ''  }}>Pusat
                                                    Studi Pangan dan Gizi</option>
                                                <option value='117' {{ request('unit_id') == 117 ? 'selected' : ''  }}>Pusat
                                                    Studi Bioteknologi</option>
                                                <option value='118' {{ request('unit_id') == 118 ? 'selected' : ''  }}>Pusat
                                                    Studi Kependudukan dan Kebijakan</option>
                                                <option value='119' {{ request('unit_id') == 119 ? 'selected' : ''  }}>Pusat
                                                    Studi Lingkungan Hidup</option>
                                                <option value='120' {{ request('unit_id') == 120 ? 'selected' : ''  }}>Pusat
                                                    Studi Pariwisata</option>
                                                <option value='121' {{ request('unit_id') == 121 ? 'selected' : ''  }}>Pusat
                                                    Studi Farmakologi Klinik dan Kebijakan Obat</option>
                                                <option value='122' {{ request('unit_id') == 122 ? 'selected' : ''  }}>Pusat
                                                    Studi Pedesaan dan Kawasan</option>
                                                <option value='123' {{ request('unit_id') == 123 ? 'selected' : ''  }}>Pusat
                                                    Studi Asia Pasifik</option>
                                                <option value='124' {{ request('unit_id') == 124 ? 'selected' : ''  }}>Pusat
                                                    Studi Wanita</option>
                                                <option value='125' {{ request('unit_id') == 125 ? 'selected' : ''  }}>Pusat
                                                    Studi Pancasila</option>
                                                <option value='126' {{ request('unit_id') == 126 ? 'selected' : ''  }}>Pusat
                                                    Studi Sumberdaya dan Teknologi Kelautan</option>
                                                <option value='127' {{ request('unit_id') == 127 ? 'selected' : ''  }}>Pusat
                                                    Studi Energi</option>
                                                <option value='128' {{ request('unit_id') == 128 ? 'selected' : ''  }}>Pusat
                                                    Studi Transportasi dan Logistik</option>
                                                <option value='129' {{ request('unit_id') == 129 ? 'selected' : ''  }}>Pusat
                                                    Studi Ekonomi dan Kebijakan Publik</option>
                                                <option value='130' {{ request('unit_id') == 130 ? 'selected' : ''  }}>Pusat
                                                    Studi Bencana</option>
                                                <option value='131' {{ request('unit_id') == 131 ? 'selected' : ''  }}>Pusat
                                                    Studi Ilmu Teknik</option>
                                                <option value='132' {{ request('unit_id') == 132 ? 'selected' : ''  }}>Pusat
                                                    Studi Sosial Asia Tenggara</option>
                                                <option value='133' {{ request('unit_id') == 133 ? 'selected' : ''  }}>Pusat
                                                    Studi Ekonomi Kerakyatan (PUSTEK)</option>
                                                <option value='135' {{ request('unit_id') == 135 ? 'selected' : ''  }}>Pusat
                                                    Studi Perencanaan Pembangunan Regional</option>
                                                <option value='136' {{ request('unit_id') == 136 ? 'selected' : ''  }}>Pusat
                                                    Studi Korea</option>
                                                <option value='142' {{ request('unit_id') == 142 ? 'selected' : ''  }}>UGM
                                                    Residence</option>
                                                <option value='143' {{ request('unit_id') == 143 ? 'selected' : ''  }}>Pusat
                                                    Studi Keamanan dan Perdamaian</option>
                                                <option value='144' {{ request('unit_id') == 144 ? 'selected' : ''  }}>Pusat
                                                    Studi Agroekologi</option>
                                                <option value='145' {{ request('unit_id') == 145 ? 'selected' : ''  }}>Pusat
                                                    Studi Jerman</option>
                                                <option value='146' {{ request('unit_id') == 146 ? 'selected' : ''  }}>Pusat
                                                    Studi Kebudayaan</option>
                                                <option value='147' {{ request('unit_id') == 147 ? 'selected' : ''  }}>Pusat
                                                    Studi Sumber Daya Lahan</option>
                                                <option value='148' {{ request('unit_id') == 148 ? 'selected' : ''  }}>Pusat
                                                    Studi Jepang</option>
                                                <option value='149' {{ request('unit_id') == 149 ? 'selected' : ''  }}>Pusat
                                                    Studi Pengelolaan Sumber Daya Hayati</option>
                                                <option value='151' {{ request('unit_id') == 151 ? 'selected' : ''  }}>Rumah
                                                    Sakit Akademik</option>
                                                <option value='152' {{ request('unit_id') == 152 ? 'selected' : ''  }}>UPT
                                                    Percetakan dan Penerbitan UGM (GAMA PRESS)</option>
                                                <option value='157' {{ request('unit_id') == 157 ? 'selected' : ''  }}>Pusat
                                                    Kebudayaan Koesnadi Hardjasoemantri</option>
                                                <option value='159' {{ request('unit_id') == 159 ? 'selected' : ''  }}>Pusat
                                                    Studi Perdagangan Dunia</option>
                                                <option value='160' {{ request('unit_id') == 160 ? 'selected' : ''  }}>
                                                    Majelis
                                                    Wali Amanat</option>
                                                <option value='161' {{ request('unit_id') == 161 ? 'selected' : ''  }}>Wisma
                                                    MM
                                                </option>
                                                <option value='162' {{ request('unit_id') == 162 ? 'selected' : ''  }}>Senat
                                                    Akademik Universitas</option>
                                                <option value='164' {{ request('unit_id') == 164 ? 'selected' : ''  }}>
                                                    Direktorat Pengembangan Usaha dan Inkubasi</option>
                                                <option value='167' {{ request('unit_id') == 167 ? 'selected' : ''  }}>Unit
                                                    Pengadaan</option>
                                                <option value='168' {{ request('unit_id') == 168 ? 'selected' : ''  }}>UGM
                                                    Kampus Jakarta</option>
                                                <option value='169' {{ request('unit_id') == 169 ? 'selected' : ''  }}>MSi
                                                    (Magister Sains dan Doktor) FEB</option>
                                                <option value='170' {{ request('unit_id') == 170 ? 'selected' : ''  }}>MM
                                                    Kampus Yogyakarta</option>
                                                <option value='171' {{ request('unit_id') == 171 ? 'selected' : ''  }}>MM
                                                    Kampus Jakarta</option>
                                                <option value='172' {{ request('unit_id') == 172 ? 'selected' : ''  }}>
                                                    Magister
                                                    Ekonomika Pembangunan (MEP) FEB</option>
                                                <option value='173' {{ request('unit_id') == 173 ? 'selected' : ''  }}>
                                                    Magister
                                                    Akuntansi (MAKSI) FEB</option>
                                                <option value='174' {{ request('unit_id') == 174 ? 'selected' : ''  }}>
                                                    Penelitian dan Pelatihan Ekonomika dan Bisnis (P2EB) FEB</option>
                                                <option value='175' {{ request('unit_id') == 175 ? 'selected' : ''  }}>
                                                    Pendidikan Profesi Akuntansi (PPAK) FEB</option>
                                                <option value='176' {{ request('unit_id') == 176 ? 'selected' : ''  }}>
                                                    Kantor
                                                    Audit Internal</option>
                                                <option value='179' {{ request('unit_id') == 179 ? 'selected' : ''  }}>
                                                    Kantor
                                                    Hukum dan Organisasi</option>
                                                <option value='200' {{ request('unit_id') == 200 ? 'selected' : ''  }}>Dewan
                                                    Audit</option>
                                                <option value='203' {{ request('unit_id') == 203 ? 'selected' : ''  }}>
                                                    Direktorat Pendidikan dan Pengajaran</option>
                                                <option value='204' {{ request('unit_id') == 204 ? 'selected' : ''  }}>
                                                    Direktorat Penelitian</option>
                                                <option value='205' {{ request('unit_id') == 205 ? 'selected' : ''  }}>
                                                    Direktorat Pengabdian kepada Masyarakat</option>
                                                <option value='206' {{ request('unit_id') == 206 ? 'selected' : ''  }}>
                                                    Direktorat Sistem dan Sumber Daya Informasi</option>
                                                <option value='209' {{ request('unit_id') == 209 ? 'selected' : ''  }}>Badan
                                                    Penerbit dan Publikasi</option>
                                                <option value='212' {{ request('unit_id') == 212 ? 'selected' : ''  }}>Pusat
                                                    Pengadaan dan Logistik</option>
                                                <option value='213' {{ request('unit_id') == 213 ? 'selected' : ''  }}>Pusat
                                                    Inovasi dan Kajian Akademik</option>
                                                <option value='214' {{ request('unit_id') == 214 ? 'selected' : ''  }}>
                                                    Direktorat Aset</option>
                                                <option value='215' {{ request('unit_id') == 215 ? 'selected' : ''  }}>Dewan
                                                    Guru Besar</option>
                                                <option value='217' {{ request('unit_id') == 217 ? 'selected' : ''  }}>
                                                    Direktorat Kemitraan, Alumni, dan Urusan Internasional</option>
                                                <option value='219' {{ request('unit_id') == 219 ? 'selected' : ''  }}>Rumah
                                                    Sakit</option>
                                                <option value='220' {{ request('unit_id') == 220 ? 'selected' : ''  }}>Pusat
                                                    Inovasi Agroteknologi</option>
                                                <option value='221' {{ request('unit_id') == 221 ? 'selected' : ''  }}>
                                                    Sekretariat Universitas</option>
                                                <option value='222' {{ request('unit_id') == 222 ? 'selected' : ''  }}>
                                                    Sekretaris Eksekutif</option>
                                                <option value='223' {{ request('unit_id') == 223 ? 'selected' : ''  }}>
                                                    Bagian
                                                    Hubungan Masyarakat dan Protokol</option>
                                                <option value='224' {{ request('unit_id') == 224 ? 'selected' : ''  }}>
                                                    Bagian
                                                    Hubungan Kelembagaan</option>
                                                <option value='225' {{ request('unit_id') == 225 ? 'selected' : ''  }}>Pusat
                                                    Keamanan, Keselamatan, Kesehatan Kerja dan Lingkungan</option>
                                                <option value='226' {{ request('unit_id') == 226 ? 'selected' : ''  }}>
                                                    Direktorat Perencanaan</option>
                                                <option value='230' {{ request('unit_id') == 230 ? 'selected' : ''  }}>
                                                    Gadjah
                                                    Mada Medical Center</option>
                                                <option value='232' {{ request('unit_id') == 232 ? 'selected' : ''  }}>Rumah
                                                    Sakit Gigi dan Mulut Universitas Gadjah Mada Prof. Soedomo</option>
                                                <option value='234' {{ request('unit_id') == 234 ? 'selected' : ''  }}>
                                                    Fakultas
                                                    Kedokteran, Kesehatan Masyarakat, dan Keperawatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Nama Pegawai<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" id="cari_pegawai">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>NIP</td>
                                                    <td>Nama Lengkap</td>
                                                    <td>Unit</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tablePegawai">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endpush
@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
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

        $('#cari_pegawai').click(function(){
			var nama_pegawai = $('#nama_pegawai').val();
            var no = 1;
			$.ajax({
				type: 'GET',
				url: document.location.origin + "/api/pegawai/search",
				data: {
					'nama': nama_pegawai,
				},
				success: function(data){
                    // console.log(data)
                    $.each(data, function(k, v) {
                        // console.log(data[k].nama)
                        $('#tablePegawai').append(
                            '<tr>\n\
                                <td>'+no+'</td>\n\
                                <td>'+data[k].NIP+'</td>\n\
                                <td>'+data[k].nama+'</td>\n\
                                <td>'+data[k].unit_id+'</td>\n\
                                <td>\n\
                                    <button type="button" class="btn btn-info btn-sm" onclick="addPegawai('+data[k].id+');">Pilih <i class="fas fa-chevron-right"></i></button>\n\
                                </td>\n\
                            </tr>'
                        );
                        no++;
                    });
					// $('#video-content').html(data)
				}
			});
		});

    });

    function addPegawai(id_pegawai){
        //Reset Modal Pegawai
        $("#pegawaiModal .close").click()
        $('#tablePegawai tr').remove()
        $("#pegawai_unit_id option:selected").remove()
        $('#nama_pegawai').val('')

        var pegawaiNo = parseInt($('#pegawaiNo').text())+parseInt(1);
        $.ajax({
            type: 'GET',
            url: document.location.origin + "/api/pegawai/add",
            data: {
                'id': id_pegawai,
            },
            success: function(data){
                // console.log(data)
                $('#table_anggota_pegawai').append(
                    '<tr id="table_row_pegawai'+data.id+'">\n\
                        <td>'+pegawaiNo+'</td>\n\
                        <td>'+data.nama+'\n\
                            <input type="hidden" name="pegawai_id[]" value="'+data.id+'">\n\
                        </td>\n\
                        <td>\n\
                            <div class="form-check">\n\
                                <input type="checkbox" class="form-check-input set_ketua" id="checkKetua'+data.id+'" onclick="checkKetua()">\n\
                                <label class="form-check-label" for="checkKetua'+data.id+'" onclick="checkKetua()"> Ketua</label>\n\
                            </div>\n\
                        </td>\n\
                        <td>\n\
                            <button type="button" class="btn btn-danger btn-sm" onclick="removePegawai('+data.id+')"><i class="fas fa-trash"></i></button>\n\
                        </td>\n\
                    </tr>'
                );
            }
        });
    }

    //Check Ketua
    function checkKetua(){
        var set_ketua = $('.set_ketua').filter(':checked').length
        if (set_ketua == 1){
            $('.set_ketua:not(:checked)').attr('disabled', true);
        }else if (set_ketua == 0){
            $('.set_ketua:not(:checked)').attr('disabled', false);
        }
        // console.log(set_ketua)
    }

    //Remove Row Pegawai
    function removePegawai(id){
        $('#table_row_pegawai'+id).remove()
    }
</script>
@endpush
