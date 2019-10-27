@extends('dashboard.layouts.app')

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
                                    <input type="hidden" name="hibah_id" class="form-control" placeholder="Judul Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Unit Penyelenggara</label>
                                </div>
                                <div class="col-md-10">
                                    <span>Badan Penerbit dan Publikasi</span>
                                    <input type="hidden" name="unit_id" class="form-control" placeholder="Judul Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Judul</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="title" class="form-control" placeholder="Judul Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Abstrak</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2 text-right">
                                    <label>Anggota Pegawai <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-10">
                                    <a href="#" class="btn btn-info btn-sm">Tambah</a>
                                    <input type="text" name="user_id" class="form-control">
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
