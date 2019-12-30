@extends('layouts.master')

@section('title', 'Tambah Luaran Hibah')

@section('header', 'Tambah Luaran Hibah')

@section('content')
<section class="content">
    @if(Session::has('flash_message'))
    <div class="toast mt-5" data-autohide="true" data-delay="3000" data-animation="true" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-success">
            {!! session('flash_message') !!}
        </div>
    </div>
    @endif
    @foreach ($errors->all() as $message)
    <div class="toast mt-5" data-autohide="true" data-delay="3000" data-animation="true" style="position: absolute; top: 1%; right: 0;z-index: 1;opacity: 0.9">
        <div class="toast-body pt-4 pb-4 bg-danger">
            {{ $message }}
        </div>
    </div>
    @endforeach
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Tambah Luaran Hibah</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('hibah.luaran.store', $hibah->id) }}">
                            @csrf
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Judul Hibah</label>
                                    </div>
                                    <div class="col-md-10">
                                        <p>{{ $hibah->hibah->hibah_judul }} <strong>({{ $hibah->hibah->category->nama }})</strong></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Unit</label>
                                    </div>
                                    <div class="col-md-10">
                                        <p>{{ $hibah->hibah->unit->nama }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Judul Naskah</label>
                                    </div>
                                    <div class="col-md-10">
                                        <p>{{ $hibah->judul }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Jenis Luaran <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_luaran" id="text_type1" value="1" required>
                                            <label class="form-check-label" for="text_type1"> Prosiding</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_luaran" id="text_type2" value="2" required>
                                            <label class="form-check-label" for="text_type2"> Jurnal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>DOI <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="doi" placeholder="10.1234/ugm.123" value="{{ old('doi') }}" required>
                                        <span class="text-danger font-weight-bold">{{ $errors->first('doi') }}</span>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Jurnal <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="jurnal" placeholder="Scopus / World of Science / Microsoft Academic" value="{{ old('jurnal') }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right"></div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-info">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                Jurnal bisa diisi dengan nama Jurnal dapat juga diisi dengan <i>Link</i> Jurnal.
                            </li>
                            <li>DOI yang dimasukkan akan dicek secara otomatis oleh sistem. Jika tidak valid, maka DOI akan gagal disimpan.</li>
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
    <style>
    </style>
@endpush
@push('scripts')
<script>
    $(function () {
        $('.toast').toast('show');
    })
</script>
@endpush
