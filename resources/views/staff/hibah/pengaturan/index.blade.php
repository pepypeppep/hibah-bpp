@extends('staff.layouts.app')

@section('title', 'Pengaturan Hibah')

@section('header', 'Pengaturan Hibah')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header bg-info">
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
                                    <label>Nama Hibah</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Judul Hibah">
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
                                    <label>Unit Penyelenggara</label>
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
            <div class="card-header bg-info">
                <h3 class="card-title font-weight-bold">Daftar Hibah</h3>

                <div class="card-tools">
                    <a href="{{ route('s_hibah.pengaturan.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah Hibah</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="text-center">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 300px">Hibah</th>
                            <th style="width: 120px">Publish</th>
                            <th style="width: 160px">Periode Pendaftaran</th>
                            <th style="width: 160px">Unit Penyelenggara</th>
                            <th style="width: 70px">Status</th>
                            <th style="width: 95px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hibahs as $no => $hibah)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>
                                <b>{{ $hibah->hibah_kategori_id }}</b><br>
                                {{ $hibah->hibah_judul }}
                            </td>
                            <td>{{ Carbon\Carbon::parse($hibah->hibah_tgl_publish)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($hibah->hibah_tgl_mulai)->format('d M Y') }} s/d {{ Carbon\Carbon::parse($hibah->hibah_tgl_selesai)->format('d M Y') }}</td>
                            <td>{{ $hibah->unit_id }}</td>
                            <td class="text-center">
                                @if ($hibah->hibah_tgl_mulai < now())
                                    <span class="badge badge-secondary">Belum Dibuka</span>
                                @elseif (now() > $hibah->hibah_tgl_selesai)
                                    <span class="badge badge-danger">Ditutup</span>
                                @else
                                    <span class="badge badge-success">Dibuka</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('s_hibah.pengaturan.edit', $hibah->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('s_hibah.pengaturan.show') }}" class="btn btn-sm btn-default">
                                    <i class="fas fa-eye"></i>
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
    });
</script>
@endpush
