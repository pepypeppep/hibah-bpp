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
                            <td class="font-weight-bold">Kategori</td>
                            <td>
                                {{ $hibah->hibah->category->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul Hibah</td>
                            <td>
                                {{ $hibah->hibah->hibah_judul }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Unit Penyelenggara</td>
                            <td>
                                {{ $hibah->hibah->unit->nama }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul Proposal</td>
                            <td>
                                {{ $hibah->judul }}
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Anggota Dosen/Staff</td>
                            <td>
                                @foreach ($pegawais as $peg)
                                    {{ $peg->user->name }} <sup>{{ $peg->ketua == 1 ? '(ketua)' : '(Anggota)' }}</sup>,
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Anggota Non Civitas UGM</td>
                            <td>
                                @foreach ($noncivitas as $nc)
                                    {{ $nc->nama }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Abstrak</td>
                            <td>
                                {!! $hibah->abstrak !!}
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
        <div class="row">
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header bg-default">
                        <h3 class="card-title"><b>Dokumen</b> Pengajuan</h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-2 bg-info">
                            <a href="#">
                                &emsp;<i class="fas fa-chevron-right"></i>
                                &nbsp;<span style="font-size: 1rem">Proposal</span>
                                <span class="badge badge-info" style="float: right; background: #175d68">Wajib</span>
                            </a>
                        </div>
                        <div class="p-2 bg-default">
                            <a href="#" class="text-dark">
                                &emsp;<i class="fas fa-chevron-right"></i>
                                &nbsp;<span style="font-size: 1rem">Dokumen Pendukung</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="card-body p-3" style="background: #fdca30 !important">
                            <h4 class="text-white">Perhatian</h4>
                            <p class="text-white">
                                Pastikan penjelajah/<i>browser</i> Anda sudah mendukung untuk membuka berkas <strong>pdf</strong>.<br>
                                Gunakan rekomendasi penjelajah/<i>browser</i> <a target="_blank" href="https://www.google.com/intl/id_id/chrome/">Google Chrome</a> atau <a target="_blank" href="https://www.mozilla.org/id/firefox/new/">Mozilla Firefox</a>.
                            </p>
                            <p class="text-white">Terima Kasih</p>
                        </div>
                        <div class="card-body p-3">
                            <canvas id="the-canvas"></canvas>
                            <p>
                                Jika file tidak tampil, silakan unduh disini &nbsp;<a href="#" class="btn btn-info btn-sm"><i class="fas fa-download"></i>&nbsp;Unduh</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($review[0]->tipe_dokumen == 1)
    <div class="container-fluid">
        <div class="card card-default">
            <form method="POST" action="{{ route('hibah.review.update', $getRoute) }}">
                @csrf
                @method('PUT')
                <div class="card-header bg-info">
                    <h3 class="card-title"><b>Penilaian</b> Proposal</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 40%">Kriteria Penilaian</th>
                                <th style="width: 10%">Bobot</th>
                                <th style="width: 20%">Range Nilai</th>
                                <th style="width: 20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $no => $rv)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $rv->kriteria }}</td>
                                <td>{{ $rv->bobot }}</td>
                                <td>{{ $rv->range_awal }} s/d {{ $rv->range_akhir }}</td>
                                <td>
                                    <input type="number" name="nilai[]" class="form-control" required>
                                    <input type="hidden" name="bobot[]" class="form-control" value="{{ $rv->bobot }}" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Keterangan</strong>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="5" name="komentar" style="width: 100%" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @if ($review[0]->tipe_dokumen == 2)
    <div class="container-fluid">
        <div class="card card-default">
            <form method="POST" action="">
                @csrf
                <div class="card-header bg-info">
                    <h3 class="card-title"><b>Penilaian</b> Laporan Kemajuan</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 40%">Kriteria Penilaian</th>
                                <th style="width: 10%">Bobot</th>
                                <th style="width: 20%">Range Nilai</th>
                                <th style="width: 20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $no => $rv)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $rv->kriteria }}</td>
                                <td>{{ $rv->bobot }}</td>
                                <td>{{ $rv->range_awal }} s/d {{ $rv->range_akhir }}</td>
                                <td>
                                    <input type="number" name="nilai[]" class="form-control">
                                    <input type="hidden" name="bobot[]" class="form-control" value="{{ $rv->bobot }}" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Keterangan</strong>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="5" name="komentar" style="width: 100%"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @if ($review[0]->tipe_dokumen == 3)
    <div class="container-fluid">
        <div class="card card-default">
            <form method="POST" action="">
                @csrf
                <div class="card-header bg-info">
                    <h3 class="card-title"><b>Penilaian</b> Laporan Akhir</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 40%">Kriteria Penilaian</th>
                                <th style="width: 10%">Bobot</th>
                                <th style="width: 20%">Range Nilai</th>
                                <th style="width: 20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $no => $rv)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $rv->kriteria }}</td>
                                <td>{{ $rv->bobot }}</td>
                                <td>{{ $rv->range_awal }} s/d {{ $rv->range_akhir }}</td>
                                <td>
                                    <input type="number" name="nilai[]" class="form-control">
                                    <input type="hidden" name="bobot[]" class="form-control" value="{{ $rv->bobot }}" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Keterangan</strong>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="5" name="komentar" style="width: 100%"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @if ($review[0]->tipe_dokumen == 4)
    <div class="container-fluid">
        <div class="card card-default">
            <form method="POST" action="">
                @csrf
                <div class="card-header bg-info">
                    <h3 class="card-title"><b>Penilaian</b> Luaran</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th style="width: 40%">Kriteria Penilaian</th>
                                <th style="width: 10%">Bobot</th>
                                <th style="width: 20%">Range Nilai</th>
                                <th style="width: 20%">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($review as $no => $rv)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $rv->kriteria }}</td>
                                <td>{{ $rv->bobot }}</td>
                                <td>{{ $rv->range_awal }} s/d {{ $rv->range_akhir }}</td>
                                <td>
                                    <input type="hidden" name="bobot[]" class="form-control" value="{{ $rv->bobot }}" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Keterangan</strong>
                        </div>
                        <div class="col-md-9">
                            <textarea rows="5" name="komentar" style="width: 100%"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</section>
@endsection

@push('styles')

@endpush
@push('scripts')
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<script>
    $(document).ready(function() {
        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        var url = '{{ asset("/storage/berkas_pengajuan/".$hibah->proposal[0]->hibah_dokumen_pengajuan) }}';

        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

        // Asynchronous download of PDF
        var loadingTask = pdfjsLib.getDocument(url);
        loadingTask.promise.then(function(pdf) {
        console.log('PDF loaded');

        // Fetch the first page
        var pageNumber = 1;
        pdf.getPage(pageNumber).then(function(page) {
            console.log('Page loaded');

            var scale = 1.5;
            var viewport = page.getViewport({scale: scale});

            // Prepare canvas using PDF page dimensions
            var canvas = document.getElementById('the-canvas');
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
            canvasContext: context,
            viewport: viewport
            };
            var renderTask = page.render(renderContext);
            renderTask.promise.then(function () {
            console.log('Page rendered');
            });
        });
        }, function (reason) {
        // PDF loading error
        console.error(reason);
        });
    });
</script>
@endpush
