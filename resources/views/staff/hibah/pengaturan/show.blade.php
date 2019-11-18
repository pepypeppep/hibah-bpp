@extends('staff.layouts.app')

@section('title', 'Detail Hibah')

@section('header', 'Detail Hibah')

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
                                {{ $hibah->unit->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Panduan</td>
                            <td>
                                <a href="{{ asset('storage/hibah/panduan/'.$hibah->hibah_panduan) }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-file"></i> Unduh Panduan</a>
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->slug, 1]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                                    <a href="{{ route('s_hibah.pengaturan.criteria.edit', $proposal->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $proposal->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $proposal->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin data akan dihapus?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('s_hibah.pengaturan.criteria.delete', $proposal->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->slug, 2]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                                    <a href="{{ route('s_hibah.pengaturan.criteria.edit', $kemajuan->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $kemajuan->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $kemajuan->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin data akan dihapus?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('s_hibah.pengaturan.criteria.delete', $kemajuan->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->slug, 3]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                                    <a href="{{ route('s_hibah.pengaturan.criteria.edit', $akhir->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $akhir->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $akhir->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin data akan dihapus?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('s_hibah.pengaturan.criteria.delete', $akhir->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
                    <a href="{{ route('s_hibah.pengaturan.criteria', [$hibah->slug, 4]) }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kriteria Penilaian</a>
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
                                    <a href="{{ route('s_hibah.pengaturan.criteria.edit', $luaran->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $luaran->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $luaran->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Konfirmasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin data akan dihapus?
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('s_hibah.pengaturan.criteria.delete', $luaran->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                        <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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

        $('.toast').toast('show');
    });
</script>
@endpush
