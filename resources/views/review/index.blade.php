@extends('layouts.master')

@section('title', 'Review Laporan Hibah')

@section('header', 'Review Laporan Hibah')

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
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Review Laporan Hibah</h3>

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
                            <th style="width: 20%">Pengusul</th>
                            <th style="width: 13%">Review</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($reviews) != 0)
                        @foreach ($reviews as $no => $rv)
                        <tr>
                            <td>{{ $no+1 }}</td>
                            <td>{{ $rv->pengajuanHibah->judul }}</td>
                            <td>{{ $rv->pengajuanHibah->hibah->hibah_judul }}</td>
                            <td>{{ $rv->pengajuanHibah->user->name }}</td>
                            <td>
                                @if ($rv->tipe_dokumen == 1)
                                    <span class="badge badge-danger">Proposal</span><br>
                                @elseif ($rv->tipe_dokumen == 2)
                                    <span class="badge badge-info">Laporan Kemajuan</span><br>
                                @elseif ($rv->tipe_dokumen == 3)
                                    <span class="badge badge-info">Laporan Akhir</span><br>
                                @elseif ($rv->tipe_dokumen == 4)
                                    <span class="badge badge-success">Luaran</span><br>
                                @endif
                            </td>
                            <td>
                                @if ($rv->komen == null && $rv->total == 0)
                                    <span class="badge badge-danger">Belum Direview</span>
                                @else
                                    <span class="badge badge-success">Sudah Direview</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('hibah.review.show', [$rv->pengajuanHibah->slug, $rv->slug]) }}" class="btn btn-warning">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger">Tidak ada data yang dapat ditampilkan!</div>
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
