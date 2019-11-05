@extends('staff.layouts.app')

@section('title', 'Kriteria Penilaian')

@section('header', 'Kriteria Penilaian')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Penilaian Hibah</h3>
            </div>
            <form method="POST" action="{{ route('s_hibah.pengaturan.criteria.update', $kriteria->id) }}">
                @csrf
                @method('PUT')
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-condensed">
                        <thead class="bg-info text-center">
                            <tr>
                                <th style="width: 55%">Kriteria</th>
                                <th>Bobot</th>
                                <th>Range Nilai</th>
                                <th style="width: 12%"></th>
                            </tr>
                        </thead>
                        <tbody id="dynamic_field">
                            <tr>
                                <td>
                                    <input type="text" name="kriteria" class="form-control" placeholder="Kriteria Penilaian" value="{{ $kriteria->kriteria }}" required>
                                </td>
                                <td class="text-center">
                                    <input type="number" name="bobot" class="form-control" placeholder="Bobot" value="{{ $kriteria->bobot }}" required>
                                </td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <input type="number" name="range_awal" class="form-control" placeholder="min" value="{{ $kriteria->range_awal }}" required>
                                        <div class="input-group-append input-group-prepend">
                                            <span class="input-group-text"> - </span>
                                        </div>
                                        <input type="number" name="range_akhir" class="form-control" placeholder="max" value="{{ $kriteria->range_akhir }}" required>
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{-- <button type="button" id="add" class="btn btn-sm btn-info">Add More</button> --}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="hibah_id" value="{{ $kriteria->hibah_id }}">
                    <input type="hidden" name="tipe_dokumen" value="{{ $kriteria->tipe_dokumen }}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('s_hibah.pengaturan.show', $kriteria->hibah_id) }}" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Kembali</a>
                </div>
        </form>
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
</script>
@endpush
