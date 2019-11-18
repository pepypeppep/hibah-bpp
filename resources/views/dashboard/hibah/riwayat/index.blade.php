@extends('dashboard.layouts.app')

@section('title', 'Riwayat Pengajuan Hibah')

@section('header', 'Riwayat Pengajuan Hibah')

@section('content')
<section class="content">
    @if(Session::has('flash_message'))
    <div class="toast mt-5" data-autohide="true" data-delay="3000" data-animation="true" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-success">
                {!! session('flash_message') !!}
        </div>
    </div>
    @endif
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
                <h3 class="card-title font-weight-bold">Riwayat Pengajuan Hibah</h3>

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
                            <th style="width: 1%">No</th>
                            <th style="width: 20%">Judul Yang Diajukan</th>
                            <th style="width: 20%">Nama Hibah</th>
                            <th style="width: 13%">Tanggal</th>
                            <th style="width: 5%">Status Pengajuan</th>
                            <th style="width: 8%">Status Terbit</th>
                            <th style="width: 8%">Pencairan Dana</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hibahs as $no => $hibah)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $hibah->judul }}</td>
                            <td>{{ $hibah->hibah->hibah_judul }}</td>
                            <td>
                                <strong>Tanggal Ditutup: </strong><br>{{ Carbon\Carbon::parse($hibah->hibah->hibah_tgl_selesai)->format('d M Y').' | '.Carbon\Carbon::parse($hibah->hibah->hibah_tgl_selesai)->format('H:i') }}
                                <br><br>
                                <strong>Tanggal Pengajuan: </strong><br>{{ Carbon\Carbon::parse($hibah->created_at)->format('d M Y').' | '.Carbon\Carbon::parse($hibah->created_at)->format('H:i') }}</td>
                            <td class="text-center">
                                @if ($hibah->status_pengajuan == 1)
                                    <h6><span class="badge badge-secondary">Diajukan</span></h6>
                                @elseif ($hibah->status_pengajuan == 2)
                                    <h6><span class="badge badge-info">Penilaian</span></h6>
                                @elseif ($hibah->status_pengajuan == 3)
                                    <h6><span class="badge badge-success">Diterima</span></h6>
                                @elseif ($hibah->status_pengajuan == 4)
                                    <h6><span class="badge badge-danger">Ditolak</span></h6>
                                @elseif ($hibah->status_pengajuan == 0)
                                <h6><span class="badge badge-light">Belum Diajukan</span></h6>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($hibah->status_terbit == 0)
                                    <h6>--</h6>
                                @elseif ($hibah->status_terbit == 1)
                                    <h6><span class="badge badge-secondary">Belum Terbit</span></h6>
                                @else
                                    <h6><span class="badge badge-success">Sudah Terbit</span></h6>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($hibah->status_pencairan == 1)
                                    <h6><span class="badge badge-secondary">Diajukan</span></h6>
                                @elseif ($hibah->status_pencairan == 2)
                                    <h6><span class="badge badge-warning">Verifikasi</span></h6>
                                @elseif ($hibah->status_pencairan == 3)
                                    <h6><span class="badge badge-success">Dicairkan</span></h6>
                                @elseif ($hibah->status_pencairan == 4)
                                    <h6><span class="badge badge-danger">Ditolak</span></h6>
                                @elseif ($hibah->status_pencairan == 0)
                                    <h6>--</h6>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($hibah->hibah_status == 0)
                                <a href="" class="btn btn-outline-danger btn-sm" title="Ajukan" onclick="document.getElementById('form_pub').submit();">
                                    <i class="fas fa-lock"></i>
                                </a>
                                <form method="POST" action="{{ route('hibah.daftar.doLock', $hibah->id) }}" id="form_pub">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="hibah_status" value="1">
                                </form>
                                <a href="{{ route('hibah.riwayat.edit', $hibah->slug) }}" class="btn btn-outline-warning btn-sm" title="Ubah">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('hibah.daftar.upload', $hibah->slug) }}" class="btn btn-outline-info btn-sm" title="Upload Dokumen">
                                    <i class="fas fa-file"></i>
                                </a>
                                @endif
                                <a href="{{ route('hibah.riwayat.show', $hibah->slug) }}" class="btn btn-outline-secondary btn-sm" title="Detail Pengajuan">
                                    <i class="fas fa-share"></i>
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

        $('.toast').toast('show');
    });
</script>
@endpush
