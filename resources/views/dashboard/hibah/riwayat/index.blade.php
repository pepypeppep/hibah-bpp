@extends('dashboard.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="border-left: 4px solid #17a2b8; background: #f1fbfd52">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-info">Informasi</h5>
                        <a href="" class="btn btn-outline-danger btn-xs" title="Kunci Data">
                            <i class="fas fa-lock"></i>
                        </a> Kunci Data & Ajukan&nbsp;
                        <a href="" class="btn btn-outline-warning btn-xs" title="Ubah">
                            <i class="fas fa-pencil-alt"></i>
                        </a> Ubah Pengajuan&nbsp;
                        <a href="" class="btn btn-outline-info btn-xs" title="Upload Dokumen">
                            <i class="fas fa-file"></i>
                        </a> Upload Dokumen Pengajuan&nbsp;
                        <a href="" class="btn btn-outline-secondary btn-xs" title="Detail Pengajuan">
                            <i class="fas fa-share"></i>
                        </a> Lihat Detail Pengajuan
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pengajuan Hibah</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="bg-info text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Judul Yang Diajukan</th>
                            <th>Nama Hibah</th>
                            <th>Tanggal Ditutup</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status Pengajuan</th>
                            <th>Status Terbit</th>
                            <th>Pencairan Dana</th>
                            <th style="width: 40px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>INOVASI SISTEM TERINTEGRASI SIMASTER</td>
                            <td>Hibah Inovasi Tendik UGM 2019</td>
                            <td>31 Oktober 2019</td>
                            <td>1 Oktober 2019</td>
                            <td class="text-center">
                                <h6><span class="badge badge-info">Penilaian</span></h6>
                            </td>
                            <td class="text-center">
                                <h6><span class="badge badge-secondary">Belum Terbit</span></h6>
                            </td>
                            <td class="text-center">
                                <h6><span class="badge badge-warning">Verifikasi</span></h6>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-outline-secondary btn-sm" title="Detail Pengajuan">
                                    <i class="fas fa-share"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
    <style>

    </style>
@endpush
@push('scripts')

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>
@endpush
