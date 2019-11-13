@extends('dashboard.layouts.app')

@section('title', 'Daftar Hibah')

@section('header', 'Daftar Hibah')

@section('content')
<section class="content">
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
                                <a href="{{ route('hibah.daftar.create', $hibah->id) }}" class="btn btn-sm btn-info">Pengajuan</a>
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
    });
</script>
@endpush
