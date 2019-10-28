@extends('staff.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Detail Hibah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Nama Hibah</td>
                            <td>
                                Bantuan Penulisan Book Chapter
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Publish</td>
                            <td>
                                Senin, 30 September 2019
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Pendaftaran</td>
                            <td>
                                1 Oktober 2019 s/d 30 Oktober 2019
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Periode Laporan Kemajuan</td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Periode Laporan Final</td>
                            <td>
                                -
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Pengumuman</td>
                            <td>
                                15 November 2019 | 15:00
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Penyelenggara</td>
                            <td>
                                Badan Penerbit dan Publikasi
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Panduan</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-danger"><i class="fas fa-file"></i> Unduh Panduan</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>
                                <span class="badge badge-warning">Berlangsung</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Total Pengajuan</td>
                            <td>
                                <span class="badge badge-success">0 Diterima</span>
                                <span class="badge badge-danger">0 Ditolak</span>
                                <span class="badge badge-info">0 Sudah Dinilai</span>
                                <span class="badge badge-warning">0 Sedang Diriview</span>
                                <span class="badge badge-secondary">0 Diajukan</span>
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

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Kriteria Penilaian Proposal</h3>

                <div class="card-tools">
                    <a href="{{ route('s_hibah.pengaturan.criteria') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Range Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pengusul: First Author (nilai 1)</td>
                            <td class="text-center">20</td>
                            <td class="text-center">0 - 1</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Kriteria Penilaian Laporan Kemajuan</h3>

                <div class="card-tools">
                    <a href="{{ route('s_hibah.pengaturan.criteria') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Range Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pengusul: First Author (nilai 1)</td>
                            <td class="text-center">20</td>
                            <td class="text-center">0 - 1</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Kriteria Penilaian Laporan Akhir</h3>

                <div class="card-tools">
                    <a href="{{ route('s_hibah.pengaturan.criteria') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Range Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pengusul: First Author (nilai 1)</td>
                            <td class="text-center">20</td>
                            <td class="text-center">0 - 1</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Kriteria Penilaian Luaran</h3>

                <div class="card-tools">
                    <a href="{{ route('s_hibah.pengaturan.criteria') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Range Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Pengusul: First Author (nilai 1)</td>
                            <td class="text-center">20</td>
                            <td class="text-center">0 - 1</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
