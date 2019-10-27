@extends('dashboard.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default" style="border-left: 4px solid #ffc107; background: #fffbeea6">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-warning">Informasi Batas Perubahan Data</h5>
                        <p>Saudara masih diperbolehkan melakukan penguncian data dan perubahan data pengajuan Hibah
                            sampai dengan Kamis, 31 Oktober 2019 | 15:55 .</p>
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
                <h3 class="card-title font-weight-bold">Detail Pengajuan Hibah</h3>

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
                    <tbody>
                        <tr>
                            <td class="font-weight-bold col-md-2">Nama Hibah</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Kategori Hibah</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Unit Penyelenggara</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Judul Yang Diajukan</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Abstrak</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Pegawai</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Mahasiswa</td>
                            <td>ISI</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Non Sivitas UGM</td>
                            <td>ISI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Dokumen</h3>

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
                            <th>Jenis Dokumen</th>
                            <th>File</th>
                            <th>Dokumen Wajib</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Proposal</td>
                            <td class="text-center">
                                <a href="#">nama.pdf</a>
                            </td>
                            <td class="text-center">Ya</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Luaran</h3>

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
                            <th>Tipe Luaran</th>
                            <th>Judul</th>
                            <th>Status <i>Published</i></th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">JUDUL</td>
                            <td class="text-center">
                                <span class="badge badge-secondary">Belum Terbit</span>
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
