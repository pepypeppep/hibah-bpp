@extends('staff.layouts.app')

@section('title', 'Detail Hibah')

@section('header', 'Detail Hibah')

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
                                {{ $hibah->hibah_judul }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Publish</td>
                            <td>
                                {{ Carbon\Carbon::parse($hibah->hibah_tgl_publish)->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Pendaftaran</td>
                            <td>
                                {{ Carbon\Carbon::parse($hibah->hibah_tgl_mulai)->format('d M Y'). ' s/d '.Carbon\Carbon::parse($hibah->hibah_tgl_selesai)->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Periode Laporan Kemajuan</td>
                            <td>
                                @if ($hibah->hibah_tgl_mulai_laporankemajuan && $hibah->hibah_tgl_selesai_laporankemajuan)
                                    {{ Carbon\Carbon::parse($hibah->hibah_tgl_mulai_laporankemajuan)->format('d M Y').' s/d '.Carbon\Carbon::parse($hibah->hibah_tgl_selesai_laporankemajuan)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Periode Laporan Final</td>
                            <td>
                                @if ($hibah->hibah_tgl_mulai_laporanfinal && $hibah->hibah_tgl_selesai_laporanfinal)
                                    {{ Carbon\Carbon::parse($hibah->hibah_tgl_mulai_laporanfinal)->format('d M Y').' s/d '.Carbon\Carbon::parse($hibah->hibah_tgl_selesai_laporanfinal)->format('d M Y') }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tanggal Pengumuman</td>
                            <td>
                                {{ Carbon\Carbon::parse($hibah->hibah_tgl_pengumuman)->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Penyelenggara</td>
                            <td>
                                {{ $hibah->unit_id }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Panduan</td>
                            <td>
                                <a href="{{ $hibah->hibah_panduan }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-file"></i> Unduh Panduan</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Status</td>
                            <td>
                                @if (now() >= $hibah->hibah_tgl_mulai && now() <= $hibah->hibah_tgl_selesai)
                                    <span class="badge badge-warning">Berlangsung</span>
                                @elseif (now() > $hibah->hibah_tgl_mulai && now() > $hibah->hibah_tgl_selesai)
                                    <span class="badge badge-danger">Ditutup</span>
                                @elseif (now() < $hibah->hibah_tgl_mulai && now() < $hibah->hibah_tgl_selesai)
                                    <span class="badge badge-secondary">Belum Dibuka</span>
                                @endif
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->id, 1]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                        @if (count($proposals) != 0)
                            @foreach ($proposals as $no => $proposal)
                            <tr>
                                <td class="text-center" style="width: 5%">{{ $no+1 }}</td>
                                <td style="width: 60%">{{ $proposal->kriteria }}</td>
                                <td class="text-center" style="width: 5%">{{ $proposal->bobot }}</td>
                                <td class="text-center" style="width: 10%">{{ $proposal->range_awal.' - '.$proposal->range_akhir }}</td>
                                <td style="width: 10%">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">Tidak ada data!</div>
                                </td>
                            </tr>
                        @endif
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->id, 2]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                        @if (count($kemajuans) != 0)
                            @foreach ($kemajuans as $no => $kemajuan)
                            <tr>
                                <td class="text-center" style="width: 5%">{{ $no+1 }}</td>
                                <td style="width: 60%">{{ $kemajuan->kriteria }}</td>
                                <td class="text-center" style="width: 5%">{{ $kemajuan->bobot }}</td>
                                <td class="text-center" style="width: 10%">{{ $kemajuan->range_awal.' - '.$kemajuan->range_akhir }}</td>
                                <td style="width: 10%">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">Tidak ada data!</div>
                                </td>
                            </tr>
                        @endif
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->id, 3]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                        @if (count($akhirs) != 0)
                            @foreach ($akhirs as $no => $akhir)
                            <tr>
                                <td class="text-center" style="width: 5%">{{ $no+1 }}</td>
                                <td style="width: 60%">{{ $akhir->kriteria }}</td>
                                <td class="text-center" style="width: 5%">{{ $akhir->bobot }}</td>
                                <td class="text-center" style="width: 10%">{{ $akhir->range_awal.' - '.$akhir->range_akhir }}</td>
                                <td style="width: 10%">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">Tidak ada data!</div>
                                </td>
                            </tr>
                        @endif
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->id, 4]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                        @if (count($luarans) != 0)
                            @foreach ($luarans as $no => $luaran)
                            <tr>
                                <td class="text-center" style="width: 5%">{{ $no+1 }}</td>
                                <td style="width: 60%">{{ $luaran->kriteria }}</td>
                                <td class="text-center" style="width: 5%">{{ $luaran->bobot }}</td>
                                <td class="text-center" style="width: 10%">{{ $luaran->range_awal.' - '.$luaran->range_akhir }}</td>
                                <td style="width: 10%">
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger">Tidak ada data!</div>
                                </td>
                            </tr>
                        @endif
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
