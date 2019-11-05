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
            <form method="POST" action="{{ route('s_hibah.pengaturan.criteria.store', [$hibah_id, $criteria]) }}">
                @csrf
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
                                    <input type="text" name="kriteria[]" class="form-control" placeholder="Kriteria Penilaian" required>
                                </td>
                                <td class="text-center">
                                    <input type="number" name="bobot[]" class="form-control" placeholder="Bobot" required>
                                </td>
                                <td class="text-center">
                                    <div class="input-group">
                                        <input type="number" name="range_awal[]" class="form-control" placeholder="min" required>
                                        <div class="input-group-append input-group-prepend">
                                            <span class="input-group-text"> - </span>
                                        </div>
                                        <input type="number" name="range_akhir[]" class="form-control" placeholder="max" required>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="add" class="btn btn-sm btn-info">Add More</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="tipe_dokumen" value="{{ $criteria }}">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{ route('s_hibah.pengaturan.show', $hibah_id) }}" class="btn btn-sm btn-warning"><i class="fas fa-undo"></i> Kembali</a>
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
    $(function () {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Initialize Select2 Elements
        $('.select2').select2()

        var i=1;
        $('#add').click( function(){
            i++;
            $('#dynamic_field').append(
                '<tr id="row'+i+'">\n\
                <td><input type="text" name="kriteria[]" placeholder="Kriteria Penilaian" class="form-control" /></td>\n\
                <td class="text-center"><input type="number" step="any" name="bobot[]" placeholder="Bobot" class="form-control" /></td>\n\
                <td class="text-center">\n\
                <div class="input-group">\n\
                <input type="number" name="range_awal[]" class="form-control" placeholder="min">\n\
                <div class="input-group-append input-group-prepend">\n\
                <span class="input-group-text"> - </span>\n\
                </div>\n\
                <input type="number" name="range_akhir[]" class="form-control" placeholder="max">\n\
                </div>\n\
                </td>\n\
                <td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>\n\
                </tr>'
            );
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
    });
</script>
@endpush
