@extends('dashboard.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Upload Proposal dan Dokumen Pendukung</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hibah.daftar.doupload', $hibah->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Jenis Dokumen <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control" name="jenis_dokumen_id" required>
                                            <option value="0">Proposal</option>
                                            <option value="1">Dokumen Pendukung</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Nama Berkas</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="dokumen_nama">
                                        <small class="text-muted">Masukan nama berkas jika berkas lebih dari satu.</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Upload Proposal <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="hibah_dokumen_pengajuan" required>
                                        <small class="text-muted">Berkas wajib berekstensi .pdf dan ukuran maksimal 2 megabytes.</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right"></div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-info">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if (!is_null($berkas))
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Jenis Dokumen</td>
                                        <td>Nama Dokumen</td>
                                        <td>Dokumen Wajib</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($berkas as $no => $bks)
                                    <tr>
                                        <td>{{ $no+1 }}</td>
                                        <td>{{ $bks->jenis_dokumen_id == 0 ? 'Proposal' : 'Dokumen Pendukung' }}</td>
                                        <td>
                                            <a href="{{ asset('storage/berkas_pengajuan/'.$bks->hibah_dokumen_pengajuan) }}">{{ $bks->hibah_dokumen_pengajuan }}</a>
                                        </td>
                                        <td>{{ $bks->jenis_dokumen_id == 0 ? 'Ya' : 'Tidak' }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <div class="card-body text-right">
                        @if ($cek_berkas == 0)
                        <small class="text-danger">Belum ada dokumen wajib yang diunggah (proposal)</small>&emsp;
                        @endif
                        <a href="#" class="{{ $cek_berkas == 0 ? 'disabled' : '' }}">
                            <button type="button" class="btn btn-success" {{ $cek_berkas == 0 ? 'disabled' : '' }}>Selanjutnya</button>
                        </a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Petunjuk Pengisian</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Tanda <span class="text-danger">*</span> menunjukkan bahwa kolom / field tersebut wajib diisi. </li>
                            <li>
                                Jika Saudara melakukan <i>Copy/Paste</i> pada bidang abstrak, tandai atau <i>block</i> seluruh teks di bidang abstrak. Klik <b><i>Cleanup Format</i></b> untuk membersihkan <i>format</i> teks.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <style>
        .disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endpush
@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
</script>
@endpush
