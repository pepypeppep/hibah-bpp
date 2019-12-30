@extends('layouts.master')

@section('title', 'Detail Pengajuan Hibah')

@section('header', 'Detail Pengajuan Hibah')

@section('content')
<section class="content">
    @if(Session::has('flash_message'))
    <div class="toast mt-5" data-autohide="true" data-delay="3000" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-success">
                {!! session('flash_message') !!}
        </div>
    </div>
    @endif
    @if(Session::has('flash_error'))
    <div class="toast mt-5" data-autohide="true" data-delay="3000" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-danger">
                {!! session('flash_error') !!}
        </div>
    </div>
    @endif
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Data Pengajuan</b> Hibah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Hibah Publikasi</td>
                            <td>
                                {{ $hibah->hibah->category->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul</td>
                            <td>
                                {{ $hibah->judul }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Abstrak</td>
                            <td>
                                {!! $hibah->abstrak !!}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Ketua</td>
                            <td>
                                {{ $ketua[0]->user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Anggota</td>
                            <td>
                                <b>Pengusul di Simaster:</b><br>
                                {{ $hibah->user->name }}
                                <br><br>
                                <b>Pegawai:</b><br>
                                @foreach ($pegawais as $peg)
                                    {{ $peg->user->name }},
                                @endforeach
                                <br><b>Mahasiswa:</b><br>
                                @foreach ($mahasiswas as $mhs)
                                   {{ $mhs->user->name }},
                                @endforeach
                                <br><b>Non UGM:</b><br>
                                @foreach ($noncivitas as $nc)
                                    {{ $nc->nama }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Unit</td>
                            <td>
                                {{ $hibah->hibah->unit->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>
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
                <h3 class="card-title"><b>Berkas</b> Pengajuan</h3>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hibah->berkas as $no => $bks)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>
                                <a href="{{ asset('/storage/hibah/berkas_pengajuan/'.$bks->hibah_dokumen_pengajuan) }}">
                                    {{ $bks->hibah_dokumen_pengajuan }}
                                </a>
                            </td>
                            <td class="text-center">{{ $bks->jenis_dokumen_id == 0 ? 'Proposal' : 'Dokumen Pendukung' }}</td>
                            <td class="text-center">{{ $bks->jenis_dokumen_id == 0 ? 'Ya' : 'Tidak' }}</td>
                            <td>
                                <a href="{{ asset('/storage/hibah/berkas_pengajuan/'.$bks->hibah_dokumen_pengajuan) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Tampilkan</a>
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

    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-warning">
                <h3 class="card-title"><b>Status</b> Pencairan Dana</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="container">
                    <div class="card card-default mt-4 ml-3 mr-3" style="border-left: 4px solid #ffc107; background: #ffc10717">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-warning">Informasi</h5>
                                    <p>Untuk melengkapi informasi pencairan dana, status pencairan dana harus diubah.</p>
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
                            <div class="card-header bg-warning">
                                <h3 class="card-title">Perbaharui status pencairan dana</h3>
                            </div>
                            <div class="card-body text-center">
                                <form method="POST" action="{{ route('s_hibah.keuangan.update', $hibah->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pencairan" class="form-control" required>
                                        <option value="0" {{ $hibah->status_pencairan == 0 ? 'selected' : '' }}>--</option>
                                        <option value="1" {{ $hibah->status_pencairan == 1 ? 'selected' : '' }}>Verifikasi Berkas BPP</option>
                                        <option value="2" {{ $hibah->status_pencairan == 2 ? 'selected' : '' }}>Pengajuan Keuangan UGM</option>
                                        <option value="3" {{ $hibah->status_pencairan == 3 ? 'selected' : '' }}>Terbayar</option>
                                        <option value="4" {{ $hibah->status_pencairan == 4 ? 'selected' : '' }}>Ditolak</option>
                                    </select><br>
                                    <button type="submit" class="btn btn-warning">Simpan</button>
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

        $('.toast').toast('show');
    });
</script>
@endpush
