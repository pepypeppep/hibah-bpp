@extends('layouts.master')

@section('title', 'Tambah Hibah')

@section('header', 'Tambah Hibah')

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
                        <form method="POST" action="{{ route('s_hibah.pengaturan.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
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
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                            @endforeach
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
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                                            @endforeach
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
