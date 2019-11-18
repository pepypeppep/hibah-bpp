@extends('dashboard.layouts.app')

@section('title', 'Detail Pengajuan Hibah')

@section('header', 'Detail Pengajuan Hibah')

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
                            sampai dengan {{ Carbon\Carbon::parse($hibah->hibah->hibah_tgl_selesai)->format('d M Y').' | '.Carbon\Carbon::parse($hibah->hibah->hibah_tgl_selesai)->format('H:i') }} .</p>
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
                            <td>{{ $hibah->hibah->hibah_judul }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Kategori Hibah</td>
                            <td>{{ $hibah->hibah->category->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Unit Penyelenggara</td>
                            <td>{{ $hibah->hibah->unit->nama }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Judul Yang Diajukan</td>
                            <td>{{ $hibah->judul }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Abstrak</td>
                            <td>{!! $hibah->abstrak !!}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Pegawai</td>
                            <td>
                                @foreach ($pegawais as $peg)
                                    @if ($peg->ketua == 1)
                                        <span class="font-weight-bold">{{ $peg->user->name }}</span>
                                        <sup class="font-weight-bold">(Ketua)</sup>
                                    @else
                                        <span>{{ $peg->user->name }}</span>
                                        <sup>(Anggota)</sup>
                                    @endif
                                    ,
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Mahasiswa</td>
                            <td>
                                @foreach ($mahasiswas as $mhs)
                                    @if ($mhs->ketua == 1)
                                        <span class="font-weight-bold">{{ $mhs->user->name }}</span>
                                        <sup class="font-weight-bold">(Ketua)</sup>
                                    @else
                                        <span>{{ $mhs->user->name }}</span>
                                        <sup>(Anggota)</sup>
                                    @endif
                                    ,
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold col-md-2">Anggota Non Sivitas UGM</td>
                            <td>
                                @foreach ($noncivitas as $nc)
                                    {{ $mhs->nama.' ('.$mhs->instansi.'), ' }}
                                @endforeach
                            </td>
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
                        @foreach ($berkas as $no => $bks)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td class="text-center">{{ $bks->jenis_dokumen_id == 0 ? 'Proposal' : 'Dokumen Pendukung' }}</td>
                            <td class="text-center">
                                <a href="{{ asset('storage/berkas_pengajuan/'.$bks->hibah_dokumen_pengajuan) }}">
                                    {{ $bks->hibah_dokumen_pengajuan }}
                                </a>
                            </td>
                            <td class="text-center">{{ $bks->jenis_dokumen_id == 0 ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        @endforeach
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
