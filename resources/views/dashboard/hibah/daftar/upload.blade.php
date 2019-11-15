@extends('dashboard.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Upload Proposal dan Dokumen Pendukung</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hibah.daftar.doupload', $hibah->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Jenis Dokumen <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="jenis_dokumen_id" required>
                                            <option value="0">Proposal</option>
                                            <option value="1">Dokumen Pendukung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Nama Berkas</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="dokumen_nama">
                                        <small class="text-muted">Masukan nama berkas jika berkas lebih dari satu.</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Upload Proposal <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="hibah_dokumen_pengajuan" required>
                                        <small class="text-muted">Berkas wajib berekstensi .pdf dan ukuran maksimal 2 megabytes.</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right"></div>
                                    <div class="col-md-10 text-right">
                                        <button type="submit" class="btn btn-success">Selanjutnya</button>
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
