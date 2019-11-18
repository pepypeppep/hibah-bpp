@extends('dashboard.layouts.app')

@section('title', 'Penguncian Data Pengajuan Hibah')

@section('header', 'Penguncian Data Pengajuan Hibah')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Informasi</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card card-default" style="border-left: 4px solid #17a2b8; background: #f1fbfd52">
                            <div class="card-body">
                                <ul>
                                    <li>
                                        <strong>Simpan dan Edit</strong>: Jika dianggap belum final dan akan dilengkapi/diperbaiki. Silakan pilih <strong>"Ajukan"</strong> untuk menyelesaikan proses usulan.
                                    </li>
                                    <li>
                                        <strong>Ajukan</strong> Jika sudah final. Data tidak bisa diubah kembali.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning text-white" onclick="document.getElementById('form_draft').submit();">Simpan dan Edit</button>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('form_pub').submit();">Ajukan</button>
                            <form method="POST" action="{{ route('hibah.daftar.doLock', $hibah->id) }}" id="form_draft">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="hibah_status" value="0">
                            </form>
                            <form method="POST" action="{{ route('hibah.daftar.doLock', $hibah->id) }}" id="form_pub">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="hibah_status" value="1">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush
