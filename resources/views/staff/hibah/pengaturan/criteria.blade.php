@extends('staff.layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Penilaian Hibah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-condensed">
                    <thead class="bg-info text-center">
                        <tr>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                            <th>Range Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="criteria" class="form-control" placeholder="Kriteria Penilaian" required>
                            </td>
                            <td>
                                <input type="number" name="bobot[]" class="form-control" placeholder="bobot">
                            </td>
                            <td>
                                <input type="number" name="min[]" class="form-control" placeholder="min"> -
                                <input type="number" name="max[]" class="form-control" placeholder="max">
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Add More</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-save"></i> Simpan</button>
                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-ricycle"></i> Kembali</a>
            </div>
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
