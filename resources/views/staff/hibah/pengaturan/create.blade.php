@extends('staff.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Hibah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="#" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Judul Hibah<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_judul" class="form-control" placeholder="" required>
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
                                        <select name="hibah_kategori" class="form-control select2" style="width: 100%;" required>
                                            <option value="">-</option>
                                            <option value="7">Penelitian</option>
                                            <option value="8">Pengabdian</option>
                                            <option value="9">Publikasi</option>
                                            <option value="10">Pendidikan</option>
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
                                        <input type="text" name="hibah_tgl_publish" class="form-control datetimepicker" placeholder="" required>
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
                                        <input type="text" name="hibah_tgl_mulai" class="form-control datetimepicker" placeholder="" required>
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
                                        <input type="text" name="hibah_tgl_selesai" class="form-control datetimepicker" placeholder="" required>
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
                                        <input type="text" name="hibah_tgl_mulai_laporankemajuan" class="form-control datetimepicker" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Selesai Tahap Laporan Kemajuan</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_selesai_laporankemajuan" class="form-control datetimepicker" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Mulai Tahap Laporan Final</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_mulai_laporanfinal" class="form-control datetimepicker" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Selesai Tahap Laporan Final</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_selesai_laporanfinal" class="form-control datetimepicker" placeholder="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Tanggal Pengumuman<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="hibah_tgl_pengumuman" class="form-control datetimepicker" placeholder="" required>
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
                                        <select name="hibah_unit_id" class="form-control select2" style="width: 100%;" required>
                                            <option selected>-</option>
                                            <option value='67' >Fakultas Biologi</option>
                                            <option value='69' >Fakultas Farmasi</option>
                                            <option value='70' >Fakultas Filsafat</option>
                                            <option value='71' >Fakultas Geografi</option>
                                            <option value='72' >Fakultas Hukum</option>
                                            <option value='73' >Fakultas Ilmu Sosial dan Ilmu Politik</option>
                                            <option value='74' >Fakultas Kedokteran</option>
                                            <option value='75' >Fakultas Kedokteran Gigi</option>
                                            <option value='76' >Fakultas Kedokteran Hewan</option>
                                            <option value='77' >Fakultas Kehutanan</option>
                                            <option value='78' >Fakultas Matematika dan Ilmu Pengetahuan Alam</option>
                                            <option value='79' >Fakultas Pertanian</option>
                                            <option value='80' >Fakultas Peternakan</option>
                                            <option value='81' >Fakultas Psikologi</option>
                                            <option value='83' >Fakultas Teknik</option>
                                            <option value='84' >Fakultas Teknologi Pertanian</option>
                                            <option value='85' >Fakultas Ilmu Budaya</option>
                                            <option value='86' >Direktorat Keuangan</option>
                                            <option value='88' >Direktorat Sumber Daya Manusia</option>
                                            <option value='90' >Direktorat Perencanaan dan Pengembangan</option>
                                            <option value='91' >Direktorat Kemahasiswaan</option>
                                            <option value='92' >Fakultas Ekonomika dan Bisnis</option>
                                            <option value='94' >Perpustakaan</option>
                                            <option value='95' >Arsip Universitas</option>
                                            <option value='96' >Sekolah Pascasarjana</option>
                                            <option value='102' >KORPAGAMA</option>
                                            <option value='106' >Laboratorium Penelitian dan Pengujian Terpadu (LPPT)</option>
                                            <option value='109' >Kantor Jaminan Mutu</option>
                                            <option value='111' >Sekolah Vokasi</option>
                                            <option value='112' >Bagian Tata Usaha dan Rumah Tangga</option>
                                            <option value='113' >Grha Sabha Pramana</option>
                                            <option value='116' >Pusat Studi Pangan dan Gizi</option>
                                            <option value='117' >Pusat Studi Bioteknologi</option>
                                            <option value='118' >Pusat Studi Kependudukan dan Kebijakan</option>
                                            <option value='119' >Pusat Studi Lingkungan Hidup</option>
                                            <option value='120' >Pusat Studi Pariwisata</option>
                                            <option value='121' >Pusat Studi Farmakologi Klinik dan Kebijakan Obat</option>
                                            <option value='122' >Pusat Studi Pedesaan dan Kawasan</option>
                                            <option value='123' >Pusat Studi Asia Pasifik</option>
                                            <option value='124' >Pusat Studi Wanita</option>
                                            <option value='125' >Pusat Studi Pancasila</option>
                                            <option value='126' >Pusat Studi Sumberdaya dan Teknologi Kelautan</option>
                                            <option value='127' >Pusat Studi Energi</option>
                                            <option value='128' >Pusat Studi Transportasi dan Logistik</option>
                                            <option value='129' >Pusat Studi Ekonomi dan Kebijakan Publik</option>
                                            <option value='130' >Pusat Studi Bencana</option>
                                            <option value='131' >Pusat Studi Ilmu Teknik</option>
                                            <option value='132' >Pusat Studi Sosial Asia Tenggara</option>
                                            <option value='133' >Pusat Studi Ekonomi Kerakyatan (PUSTEK)</option>
                                            <option value='135' >Pusat Studi Perencanaan Pembangunan Regional</option>
                                            <option value='136' >Pusat Studi Korea</option>
                                            <option value='142' >UGM Residence</option>
                                            <option value='143' >Pusat Studi Keamanan dan Perdamaian</option>
                                            <option value='144' >Pusat Studi Agroekologi</option>
                                            <option value='145' >Pusat Studi Jerman</option>
                                            <option value='146' >Pusat Studi Kebudayaan</option>
                                            <option value='147' >Pusat Studi Sumber Daya Lahan</option>
                                            <option value='148' >Pusat Studi Jepang</option>
                                            <option value='149' >Pusat Studi Pengelolaan Sumber Daya Hayati</option>
                                            <option value='151' >Rumah Sakit Akademik</option>
                                            <option value='152' >UPT Percetakan dan Penerbitan UGM (GAMA PRESS)</option>
                                            <option value='157' >Pusat Kebudayaan Koesnadi Hardjasoemantri</option>
                                            <option value='159' >Pusat Studi Perdagangan Dunia</option>
                                            <option value='160' >Majelis Wali Amanat</option>
                                            <option value='161' >Wisma MM</option>
                                            <option value='162' >Senat Akademik Universitas</option>
                                            <option value='164' >Direktorat Pengembangan Usaha dan Inkubasi</option>
                                            <option value='167' >Unit Pengadaan</option>
                                            <option value='168' >UGM Kampus Jakarta</option>
                                            <option value='169' >MSi (Magister Sains dan Doktor) FEB</option>
                                            <option value='170' >MM Kampus Yogyakarta</option>
                                            <option value='171' >MM Kampus Jakarta</option>
                                            <option value='172' >Magister Ekonomika Pembangunan (MEP) FEB</option>
                                            <option value='173' >Magister Akuntansi (MAKSI) FEB</option>
                                            <option value='174' >Penelitian dan Pelatihan Ekonomika dan Bisnis (P2EB) FEB</option>
                                            <option value='175' >Pendidikan Profesi Akuntansi (PPAK) FEB</option>
                                            <option value='176' >Kantor Audit Internal</option>
                                            <option value='179' >Kantor Hukum dan Organisasi</option>
                                            <option value='200' >Dewan Audit</option>
                                            <option value='203' >Direktorat Pendidikan dan Pengajaran</option>
                                            <option value='204' >Direktorat Penelitian</option>
                                            <option value='205' >Direktorat Pengabdian kepada Masyarakat</option>
                                            <option value='206' >Direktorat Sistem dan Sumber Daya Informasi</option>
                                            <option value='209' >Badan Penerbit dan Publikasi</option>
                                            <option value='212' >Pusat Pengadaan dan Logistik</option>
                                            <option value='213' >Pusat Inovasi dan Kajian Akademik</option>
                                            <option value='214' >Direktorat Aset</option>
                                            <option value='215' >Dewan Guru Besar</option>
                                            <option value='217' >Direktorat Kemitraan, Alumni, dan Urusan Internasional</option>
                                            <option value='219' >Rumah Sakit</option>
                                            <option value='220' >Pusat Inovasi Agroteknologi</option>
                                            <option value='221' >Sekretariat Universitas</option>
                                            <option value='222' >Sekretaris Eksekutif</option>
                                            <option value='223' >Bagian Hubungan Masyarakat dan Protokol</option>
                                            <option value='224' >Bagian Hubungan Kelembagaan</option>
                                            <option value='225' >Pusat Keamanan, Keselamatan, Kesehatan Kerja dan Lingkungan</option>
                                            <option value='226' >Direktorat Perencanaan</option>
                                            <option value='230' >Gadjah Mada Medical Center</option>
                                            <option value='232' >Rumah Sakit Gigi dan Mulut Universitas Gadjah Mada Prof. Soedomo</option>
                                            <option value='234' >Fakultas Kedokteran, Kesehatan Masyarakat, dan Keperawatan</option>
                                        </select>
                                        <span class="invalid-feedback">
                                            Form isian Unit dibutuhkan.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right">
                                        <label>Panduan<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="hibah_panduan" class="form-control-file" required>
                                        <span class="invalid-feedback">
                                            Form Upload Panduan belum di pilih.
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-right"></div>
                                    <div class="col-md-9 text-left">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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
                            <li>Tanda <span class="text-danger">*</span> menunjukkan bahwa kolom / field tersebut wajib diisi. </li>
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
                format: 'DD-MM-YYYY HH:mm',

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
