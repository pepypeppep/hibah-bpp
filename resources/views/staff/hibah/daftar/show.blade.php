@extends('staff.layouts.app')

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
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Luaran</b> Pengajuan</h3>
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
                            <td colspan="5">
                                <div class="alert alert-danger">Tidak ada data!</div>
                            </td>
                            {{-- <td class="text-center">1</td>
                            <td>Pengusul: First Author (nilai 1)</td>
                            <td class="text-center">20</td>
                            <td class="text-center">0 - 1</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td> --}}
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
                <h3 class="card-title"><b>Tambah</b> Reviewer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body mt-3">
                <form method="POST" action="{{ route('s_hibah.review.store', $hibah->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label>Jenis</label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipe_dokumen" id="text_type1" value="1">
                                <label class="form-check-label" for="text_type1"> Proposal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipe_dokumen" id="text_type2" value="2">
                                <label class="form-check-label" for="text_type2"> Laporan Kemajuan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipe_dokumen" id="text_type3" value="3">
                                <label class="form-check-label" for="text_type3"> Laporan Akhir</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipe_dokumen" id="text_type4" value="4">
                                <label class="form-check-label" for="text_type4"> Luaran</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-right">
                            <label>Cari Dosen</label>
                        </div>
                        <div class="col-md-8">
                            <select name="reviewer_id" id="reviewer_id" class="form-control select2" style="width: 100%;" required></select>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->

    @if (count($reviewer1) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Reviewer</b> Proposal</h3>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewer1 as $no => $rv)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $rv->user->name }}</td>
                            <td class="text-center">{{ $rv->user->unit->nama }}</td>
                            <td class="text-center reviewer1">{{ $rv->total }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $rv->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $rv->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                    <a href="{{ route('s_hibah.review.delete', $rv->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                    <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <strong>Total</strong>
                            </td>
                            <td class="text-center">
                                <span id="total1">0</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    @endif

    @if (count($reviewer2) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Reviewer</b> Laporan Kemajuan</h3>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewer2 as $no => $rv)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $rv->user->name }}</td>
                            <td class="text-center">{{ $rv->user->unit->nama }}</td>
                            <td class="text-center reviewer2">{{ $rv->total }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $rv->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $rv->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                    <a href="{{ route('s_hibah.review.delete', $rv->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                    <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <strong>Total</strong>
                            </td>
                            <td class="text-center">
                                <span id="total2">0</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    @endif

    @if (count($reviewer3) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Reviewer</b> Akhir</h3>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewer3 as $no => $rv)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $rv->user->name }}</td>
                            <td class="text-center">{{ $rv->user->unit->nama }}</td>
                            <td class="text-center reviewer3">{{ $rv->total }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $rv->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $rv->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                    <a href="{{ route('s_hibah.review.delete', $rv->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                    <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <strong>Total</strong>
                            </td>
                            <td class="text-center">
                                <span id="total3">0</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    @endif

    @if (count($reviewer4) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Reviewer</b> Luaran</h3>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviewer4 as $no => $rv)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>{{ $rv->user->name }}</td>
                            <td class="text-center">{{ $rv->user->unit->nama }}</td>
                            <td class="text-center reviewer4">{{ $rv->total }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $rv->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $rv->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
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
                                    <a href="{{ route('s_hibah.review.delete', $rv->id) }}" class="btn btn-danger col-md-2">Ya</a>
                                    <button type="button" class="btn btn-secondary col-md-2" data-dismiss="modal">Tidak</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <strong>Total</strong>
                            </td>
                            <td class="text-center">
                                <span id="total4">0</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    @endif

    @if (count($komentars) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Komentar</b> Reviewer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <tbody>
                        @foreach ($komentars as $no => $komen)
                        <tr>
                            <td class="text-center">{{ $no+1 }}</td>
                            <td>
                                <span class="text-info">{{ $komen->user->name }}</span><br>
                                <span>{{ $komen->komentar }}</span><br>
                                <span class="text-muted">{{ Carbon\Carbon::parse($komen->updated_at)->format('d M Y H:i') }} WIB</span>
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
    @endif

    @if (count($komentars) != 0)
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
                <h3 class="card-title"><b>Status</b> Pengajuan</h3>
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
    @endif
</section>
@endsection

@push('styles')

@endpush
@push('scripts')

<script>
    $(function () {
        var total1 = 0;
        $('.reviewer1').each(function(){
            total1 += parseInt($(this).text());
        });
        $('#total1').text(total1)

        var total2 = 0;
        $('.reviewer2').each(function(){
            total2 += parseInt($(this).text());
        });
        $('#total2').text(total2)

        var total3 = 0;
        $('.reviewer3').each(function(){
            total3 += parseInt($(this).text());
        });
        $('#total3').text(total3)

        var total4 = 0;
        $('.reviewer4').each(function(){
            total4 += parseInt($(this).text());
        });
        $('#total4').text(total4)

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2').select2()

        $('#reviewer_id').select2({
            placeholder: 'Nama Reviewer...',
            ajax: {
                type: 'GET',
                url: document.location.origin + "/api/reviewer/search",
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.email,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $('.toast').toast('show');

        $('#reviewer_id').on("select2:select", function() {
            console.log("select2:select");
            $(this).parents('form').submit();
        });
    });
</script>
@endpush
