@extends('layouts.master')

@section('title', 'Daftar Pengajuan Hibah')

@section('header', 'Daftar Pengajuan Hibah')

@section('content')
<section class="content">
    @if(Session::has('flash_message'))
    <div class="toast mt-5" data-autohide="true" data-delay="3000" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-success">
                {!! session('flash_message') !!}
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
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
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Judul</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="title" class="form-control" placeholder="Judul Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Unit Pengaju</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="unit" class="form-control select2" style="width: 100%;">
                                        <option selected>Tampilkan Semua</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Hibah</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="unit" class="form-control select2" style="width: 100%;">
                                        <option selected>Tampilkan Semua</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Kategori Hibah</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="category" class="form-control select2" style="width: 100%;">
                                        <option selected>Tampilkan Semua</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Tahun</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="year" class="form-control" placeholder="Tahun Buka Pendaftaran Hibah">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="unit" class="form-control select2" style="width: 100%;">
                                        <option selected>Tampilkan Semua</option>
                                        <option>Belum Dibuka</option>
                                        <option>Dibuka</option>
                                        <option>Ditutup</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-info">Cari</button>
                                </div>
                            </div>
                        </div>
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
                <h3 class="card-title">Daftar Pengajuan Hibah</h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-sm btn-success" data-card-widget="collapse"><i class="fas fa-plus"></i> Export Excel</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="bg-info text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 300px">Hibah</th>
                            <th style="width: 120px">Judul</th>
                            <th style="width: 160px">Data Pengaju</th>
                            <th style="width: 160px">Proposal</th>
                            <th style="width: 70px">Status</th>
                            <th style="width: 70px">Status Terbit</th>
                            <th style="width: 70px">Pencairan Dana</th>
                            <th style="width: 95px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hibahs as $no => $hibah)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>
                                <b>{{ $hibah->hibah->category->nama }}</b><br>
                                {{ $hibah->hibah->hibah_judul }}
                            </td>
                            <td>{{ $hibah->judul }}</td>
                            <td>
                                <span><b>Unit: </b> {{ $hibah->hibah->unit->nama }}</span><br>
                                <span><b>Pengusul di Simaster: </b> <br>

                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ asset('/storage/hibah/berkas_pengajuan/'.$hibah->proposal[0]->hibah_dokumen_pengajuan) }}"><i class="fas fa-file"></i></a>
                            </td>
                            <td class="text-center">
                                @if ($hibah->status_pengajuan == 1)
                                    <h6><span class="badge badge-secondary">Diajukan</span></h6>
                                @elseif ($hibah->status_pengajuan == 2)
                                    <h6><span class="badge badge-warning">Sedang Diriview</span></h6>
                                @elseif ($hibah->status_pengajuan == 3)
                                    <h6><span class="badge badge-info">Sudah Dinilai</span></h6>
                                @elseif ($hibah->status_pengajuan == 4)
                                    <h6><span class="badge badge-success">Diterima</span></h6>
                                @elseif ($hibah->status_pengajuan == 5)
                                    <h6><span class="badge badge-danger">Ditolak</span></h6>
                                @elseif ($hibah->status_pengajuan == 0)
                                    <h6><span class="badge badge-light">Belum Diajukan</span></h6>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($hibah->status_terbit == 1)
                                    <h6>--</h6>
                                @elseif ($hibah->status_terbit == 2)
                                    <h6><span class="badge badge-danger">Ditolak</span></h6>
                                @elseif ($hibah->status_terbit == 3)
                                    <h6><span class="badge badge-info">Verifikasi</span></h6>
                                @elseif ($hibah->status_terbit == 4)
                                    <h6><span class="badge badge-success">Sudah Terbit</span></h6>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($hibah->status_pencairan == 1)
                                    <h6><span class="badge badge-warning">Verifikasi Berkas</span></h6>
                                @elseif ($hibah->status_pencairan == 2)
                                    <h6><span class="badge badge-info">Proses Pencairan</span></h6>
                                @elseif ($hibah->status_pencairan == 3)
                                    <h6><span class="badge badge-success">Berhasil Dicairkan</span></h6>
                                @elseif ($hibah->status_pencairan == 4)
                                    <h6><span class="badge badge-danger">Ditolak</span></h6>
                                @elseif ($hibah->status_pencairan == 0)
                                    <h6>--</h6>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('s_hibah.daftar.show', $hibah->slug) }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
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

        $('.toast').toast('show');
    });
</script>
@endpush
