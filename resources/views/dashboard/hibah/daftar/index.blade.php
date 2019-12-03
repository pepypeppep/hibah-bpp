@extends('layouts.master')

@section('title', 'Daftar Hibah')

@section('header', 'Daftar Hibah')

@section('content')
<section class="content">
    @if ($getReview != 0)
    <div class="container-fluid">
        <div class="card card-default" style="border-left: 4px solid #dc3545; background: #dc35451c">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-danger">Informasi Reviewer Hibah</h5>
                        <p>
                            Jika Saudara merupakan Reviewer Hibah, silakan menuju halaman Review Hibah
                            <a href="{{ route('hibah.review.index') }}">
                                <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-eye"></i> Review Hibah</button>
                            </a>
                        </p>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->
        <!-- /.row -->
    </div><!-- /.container-fluid -->
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
                        <form method="GET" action="">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Judul</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="judul" class="form-control" placeholder="Judul Hibah">
                                    </div>
                                </div>
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-2">
                                        <label>Kategori</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="hibah_kategori_id" class="form-control select2" style="width: 100%;">
                                            <option value="" {{ request('hibah_kategori_id') == '' ? 'selected' : '' }}>
                                                Tampilkan Semua</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ request('hibah_kategori_id') == $category->id ? 'selected' : '' }}>{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Unit Penyelenggara</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="unit_id" class="form-control select2" style="width: 100%;">
                                            <option value="" {{ request('unit_id') == '' ? 'selected' : ''  }}>Tampilkan
                                                Semua</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}" {{ request('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-info">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                <h3 class="card-title">Daftar Hibah</h3>

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
                            <th>Judul Hibah</th>
                            <th>Kategori Hibah</th>
                            <th>Tanggal Buka</th>
                            <th>Tanggal Tutup</th>
                            <th>Unit Pelaksana</th>
                            <th>Panduan</th>
                            <th style="width: 40px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hibahs as $no => $hibah)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $hibah->hibah_judul }}</td>
                            <td>{{ $hibah->category->nama }}</td>
                            <td>{{ Carbon\Carbon::parse($hibah->hibah_tgl_mulai)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($hibah->hibah_tgl_selesai)->format('d M Y') }}</td>
                            <td>{{ $hibah->unit->nama }}</td>
                            <td class="text-center">
                                <a href="{{ asset('storage/hibah/panduan/'.$hibah->hibah_panduan) }}">Download</a>
                            </td>
                            <td class="text-center">
                                @if (in_array($hibah->hibah_kategori_id, $stack))
                                <button type="button" class="btn btn-sm btn-info" disabled>Pengajuan</button>
                                @else
                                <a href="{{ route('hibah.daftar.create', $hibah->slug) }}" class="btn btn-sm btn-info">Pengajuan</a>
                                @endif
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
    <div class="modal fade" id="luaranModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda masih memiliki tanggungan laporan luaran. Apabila luaran belum dilengkapi maka anda tidak dapat mendaftar pada jenis hibah yang sama.</p>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('hibah.luaran.index') }}" class="btn btn-info">Lengkapi Luaran</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup Peringatan</button>
                </div>
            </div>
        </div>
    </div>
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

        if ({{ count($luaran) }} != {{ count($checkHibah) }}) {
            $('#luaranModal').modal('show')
        }
    });
</script>
@endpush
