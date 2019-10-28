@extends('staff.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Edit Hibah</h3>

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
                                <div class="col-md-3 text-right">
                                    <label>Judul Hibah<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Kategori Hibah<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select name="category" class="form-control select2" style="width: 100%;" required>
                                        <option selected>-</option>
                                        <option>Penelitian</option>
                                        <option>Pengabdian</option>
                                        <option>Publikasi</option>
                                        <option>Pendidikan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Publish<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="pub_date" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="start_date" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Selesai<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="end_date" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Mulai Tahap Laporan Kemajuan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="start_report_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Selesai Tahap Laporan Kemajuan</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="end_report_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Mulai Tahap Laporan Final</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="start_final_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Selesai Tahap Laporan Final</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="end_final_date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Tanggal Pengumuman<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="date" name="notice_date" class="form-control" placeholder="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Unit<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <select name="unit_id" class="form-control select2" style="width: 100%;" required>
                                        <option selected>-</option>
                                        <option>Fakultas Biologi</option>
                                        <option>Fakultas Farmasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right">
                                    <label>Panduan<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="tutorial" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-3 text-right"></div>
                                <div class="col-md-9 text-left">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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
@endpush
@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
@endpush
