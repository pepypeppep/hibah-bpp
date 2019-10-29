@extends('staff.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title">Data Pengajuan Hibah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Hibah Publikasi</td>
                            <td>
                                Bantuan Penulisan Book Chapter
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul</td>
                            <td>
                                itle
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Abstrak</td>
                            <td>
                                Lorem Ipsum
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Ketua</td>
                            <td>
                                Nama
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Anggota</td>
                            <td>
                                <b>Pengusul di Simaster:</b><br>
                                Aku
                                <br><br>
                                <b>Non UGM:</b>
                                Prof. Aku
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Unit</td>
                            <td>
                                Perpustakaan
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>
                                <span class="badge badge-secondary">Diajukan</span>
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
                <h3 class="card-title">Berkas Pengajuan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Berkas</th>
                            <th>Jenis Berkas</th>
                            <th>Berkas Wajib</th>
                            <th>Akasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Proposal_123.pdf</td>
                            <td class="text-center">Proposal</td>
                            <td class="text-center">Ya</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Tampilkan</a>
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
                <h3 class="card-title">Luaran Pengajuan</h3>
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
                <h3 class="card-title">Tambah Reviewer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 mt-3">
                <form method="POST" action="">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label>Jenis</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="text_type" id="text_type1" value="Proposal">
                                <label class="form-check-label" for="text_type1"> Proposal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="text_type" id="text_type2" value="Proposal">
                                <label class="form-check-label" for="text_type2"> Laporan Kemajuan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="text_type" id="text_type3" value="Proposal">
                                <label class="form-check-label" for="text_type3"> Laporan Akhir</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="text_type" id="text_type4" value="Proposal">
                                <label class="form-check-label" for="text_type4"> Luaran</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label>Cari Dosen</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="reviewer_name" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm"></button>
                </form>
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
                <h3 class="card-title">Reviewer Proposal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Reviewer</th>
                            <th>Unit</th>
                            <th>Nilai Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Prof. Aku</td>
                            <td class="text-center">Fakultas Farmasi</td>
                            <td class="text-center">7,8</td>
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
                <h3 class="card-title">Komentar Reviewer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <span class="text-info">Nama</span><br>
                                <p>Komentar lorem ipsum</p>
                                <span class="text-muted">5 Oktober 2019</span>
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
                <h3 class="card-title">Status Pengajuan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="container">
                    <div class="card card-default mt-4 ml-3 mr-3" style="border-left: 4px solid #17a2b8; background: #f1fbfd52">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-info">Informasi</h5>
                                    <p>Untuk melanjutkan proses review Laporan dan Luaran, status pengajuan harus diubah menjadi <b>Diterima</b></p>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header bg-info">
                                <h3 class="card-title">Apakah pengajuan ini diterima ?</h3>
                            </div>
                            <div class="card-body text-center">
                                <button type="submit" class="btn btn-outline-success col-md-5">Terima</button>
                                <button type="submit" class="btn btn-outline-danger col-md-5 ml-2">Tolak</button>
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="status" value="1">
                                </form>
                                <form method="POST" action="">
                                    @csrf
                                    <input type="hidden" name="status" value="0">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
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
