@extends('dashboard.layouts.app')

@section('title', 'Ubah Pengajuan Hibah')

@section('header', 'Ubah Pengajuan Hibah')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
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
                    <div class="card-body">
                        <form method="POST" action="{{ route('hibah.riwayat.update', $hibah->hibah->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Hibah</label>
                                    </div>
                                    <div class="col-md-10">
                                        <span>[{{ $hibah->hibah->category->nama }}] {{ $hibah->hibah->hibah_judul }}</span>
                                        <input type="hidden" name="hibah_id" class="form-control" value="{{ $hibah->hibah->id }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Unit Penyelenggara</label>
                                    </div>
                                    <div class="col-md-10">
                                        <span>{{ $hibah->hibah->unit->nama }}</span>
                                        <input type="hidden" name="unit_id" class="form-control" value="{{ $hibah->hibah->unit_id }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Judul<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="judul" class="form-control" placeholder="Judul Hibah" value="{{ $hibah->judul }}" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Abstrak</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="mb-3">
                                            <textarea class="textarea" name="abstrak" placeholder="Place some text here" style="width: 100%; height: 1000px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                {!! $hibah->abstrak !!}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Anggota Pegawai <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" data-toggle="modal" data-target="#pegawaiModal" data-backdrop="static" data-keyboard="false" class="btn btn-info btn-sm">Tambah</button>
                                        <table id="table_anggota_pegawai" class="table mt-3">
                                            @foreach ($pegawais as $no => $peg)
                                            <tr>
                                                <td id="pegawaiNo">{{ $no+1 }}</td>
                                                <td>{{ $peg->user->name }}
                                                    <input type="hidden" name="pegawai_id[]" value="{{ $peg->user_id }}">
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input set_ketua" id="checkKetuaid" name="set_ketua[]" value="{{ $peg->user_id }}" onclick="checkKetua()" {{ $peg->ketua == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="checkKetuaid" onclick="checkKetua()"> Ketua</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Anggota Mahasiswa</label>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" data-toggle="modal" data-target="#mahasiswaModal" data-backdrop="static" data-keyboard="false" class="btn btn-info btn-sm">Tambah</button>
                                        <table id="table_anggota_mahasiswa" class="table mt-3">
                                            @foreach ($mahasiswas as $no => $mhs)
                                            <tr>
                                                <td id="pegawaiNo">{{ $no+1 }}</td>
                                                <td>{{ $mhs->user->name }}
                                                    <input type="hidden" name="mahasiswa_id[]" value="{{ $mhs->user_id }}">
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input set_ketua" id="checkKetuaid" name="set_ketua[]" value="{{ $mhs->user_id }}" onclick="checkKetua()" {{ $mhs->ketua == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="checkKetuaid" onclick="checkKetua()"> Ketua</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right">
                                        <label>Anggota Non Sivitas UGM</label>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" data-toggle="modal" data-target="#nonCivitasModal" data-backdrop="static" data-keyboard="false" class="btn btn-info btn-sm">Tambah</button>
                                        <table id="table_anggota_noncivitas" class="table mt-3">
                                            @foreach ($noncivitas as $no => $nc)
                                            <tr>
                                                <td>{{ $no+1 }}</td>
                                                <td>{{ $nc->nama.' ('.$nc->instansi.')' }}
                                                    <input type="hidden" name="get_nama_noncivitas[]" value="{{ $nc->nama }}">
                                                    <input type="hidden" name="get_instansi[]" value="{{ $nc->instansi }}">
                                                </td>
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-2 text-right"></div>
                                    <div class="col-md-10 text-right">
                                        <span class="text-danger" id="buttonAlert"><small>Belum ada ketua yang dipilih.</small></span>&emsp;
                                        <button type="submit" class="btn btn-success" id="nextButton">Selanjutnya</button>
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
                                Jika Saudara melakukan <i>Copy/Paste</i> pada bidang abstrak, tandai atau <i>block</i> seluruh teks di bidang abstrak. Klik <b><i>Cleanup Format</i></b> untuk membersihkan <i>format</i> teks.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- Modal Pegawai -->
        <div class="modal fade" id="pegawaiModal" tabindex="-1" role="dialog" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pegawaiModalLabel">Cari Anggota Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Unit</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="pegawai_unit_id" id="pegawai_unit_id" class="form-control select2" style="width: 100%;">
                                                <option value="" {{ request('unit_id') == '' ? 'selected' : ''  }}>Tampilkan
                                                    Semua</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Nama Pegawai<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" id="cari_pegawai">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>NIP</td>
                                                    <td>Nama Lengkap</td>
                                                    <td>Unit</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tablePegawai">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Mahasiswa -->
        <div class="modal fade" id="mahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="mahasiswaModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mahasiswaModalLabel">Cari Anggota Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Unit</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="mahasiswa_unit_id" id="mahasiswa_unit_id" class="form-control select2" style="width: 100%;">
                                                <option value="">Tampilkan Semua</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Nama Mahasiswa<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nama_mahasiswa" id="nama_mahasiswa">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-success btn-sm" id="cari_mahasiswa">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>NIM</td>
                                                    <td>Nama Lengkap</td>
                                                    <td>Unit</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="tableMahasiswa">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Non Civitas -->
        <div class="modal fade" id="nonCivitasModal" tabindex="-1" role="dialog" aria-labelledby="nonCivitasModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nonCivitasModalLabel">Tambah Anggota Non Sivitas UGM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Nama<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="nama_noncivitas" id="nama_noncivitas" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-right">
                                            <label>Instansi<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="instansi" id="instansi" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-success btn-sm" id="tambahNonCivitas" onclick="addNonCivitas()">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@push('styles')
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
@endpush
@push('scripts')
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    //Generate Unique IDs
    function Generator() {};

    Generator.prototype.rand =  Math.floor(Math.random() * 26) + Date.now();

    Generator.prototype.getId = function() {
        return this.rand++;
    };
    var idGen =new Generator();

    $(function () {
        //Hide Alert
        $('#buttonAlert').hide();

        //Disabled Tambah Non Civitas Button
        $('#tambahNonCivitas').attr('disabled',true);

        // Summernote
        $('.textarea').summernote({
            height: 300
        })

        //Initialize Select2 Elements
        $('.select2').select2()

        $('#cari_pegawai').click(function(){
            $('#tablePegawai tr').remove()
			var nama_pegawai = $('#nama_pegawai').val()
            var pegawai_unit_id = $('#pegawai_unit_id').val()
            if (pegawai_unit_id != '') {
                unit_id = pegawai_unit_id;
            }else{
                unit_id = 0;
            }
            var no = 1;
			$.ajax({
				type: 'GET',
				url: document.location.origin + "/api/pegawai/search",
				data: {
					'nama': nama_pegawai,
                    'unit_id': unit_id
				},
				success: function(data){
                    // console.log(data)
                    if (data.length != 0){
                        $.each(data, function(k, v) {
                            // console.log(data[k].nama)
                            $('#tablePegawai').append(
                                '<tr>\n\
                                    <td>'+no+'</td>\n\
                                    <td>'+data[k].NIP+'</td>\n\
                                    <td>'+data[k].name+'</td>\n\
                                    <td>'+data[k].unit_id+'</td>\n\
                                    <td>\n\
                                        <button type="button" class="btn btn-info btn-sm" onclick="addPegawai('+data[k].id+');">Pilih <i class="fas fa-chevron-right"></i></button>\n\
                                    </td>\n\
                                </tr>'
                            );
                            no++;
                        });
                    }else{
                        $('#tablePegawai').append(
                            '<tr>\n\
                                <td>Data tidak ditemukan.</td>\n\
                            </tr>'
                        );
                    }
				}
			});
		});

        $('#cari_mahasiswa').click(function(){
            $('#tableMahasiswa tr').remove()
			var nama_mahasiswa = $('#nama_mahasiswa').val()
            var mahasiswa_unit_id = $('#mahasiswa_unit_id').val()
            if (mahasiswa_unit_id != '') {
                unit_id = mahasiswa_unit_id;
            }else{
                unit_id = 0;
            }
            var no = 1;
			$.ajax({
				type: 'GET',
				url: document.location.origin + "/api/mahasiswa/search",
				data: {
					'nama': nama_mahasiswa,
                    'unit_id': unit_id
				},
				success: function(data){
                    // console.log(data)
                    if (data.length != 0){
                        $.each(data, function(k, v) {
                            // console.log(data[k].nama)
                            $('#tableMahasiswa').append(
                                '<tr>\n\
                                    <td>'+no+'</td>\n\
                                    <td>'+data[k].NIP+'</td>\n\
                                    <td>'+data[k].name+'</td>\n\
                                    <td>'+data[k].unit_id+'</td>\n\
                                    <td>\n\
                                        <button type="button" class="btn btn-info btn-sm" onclick="addMahasiswa('+data[k].id+');">Pilih <i class="fas fa-chevron-right"></i></button>\n\
                                    </td>\n\
                                </tr>'
                            );
                            no++;
                        });
                    }else{
                        $('#tableMahasiswa').append(
                            '<tr>\n\
                                <td>Data tidak ditemukan.</td>\n\
                            </tr>'
                        );
                    }
				}
			});
		});

        //Check nama and instansi non civitas
        $('#nama_noncivitas').keyup(function(){
            if ($(this).val() == '' || $('#instansi').val() == '') {
                $('#tambahNonCivitas').attr('disabled',true);
            }else{
                $('#tambahNonCivitas').attr('disabled',false);
            }
        })

        $('#instansi').keyup(function(){
            if ($(this).val() == '' || $('#nama_noncivitas').val() == '') {
                $('#tambahNonCivitas').attr('disabled',true);
            }else{
                $('#tambahNonCivitas').attr('disabled',false);
            }
        })
    });

    function addPegawai(id_pegawai){
        //Reset Modal Pegawai
        resetModalPegawai()

        var pegawaiNo = parseInt($('#pegawaiNo').text())+parseInt(1);
        $.ajax({
            type: 'GET',
            url: document.location.origin + "/api/pegawai/add",
            data: {
                'id': id_pegawai,
            },
            success: function(data){
                // console.log(data)
                $('#table_anggota_pegawai').append(
                    '<tr id="table_row_pegawai'+data.id+'">\n\
                        <td>'+pegawaiNo+'</td>\n\
                        <td>'+data.name+'\n\
                            <input type="hidden" name="pegawai_id[]" value="'+data.id+'">\n\
                        </td>\n\
                        <td>\n\
                            <div class="form-check">\n\
                                <input type="checkbox" class="form-check-input set_ketua" id="checkKetua'+data.id+'" name="set_ketua[]" value="'+data.id+'" onclick="checkKetua()">\n\
                                <label class="form-check-label" for="checkKetua'+data.id+'" onclick="checkKetua()"> Ketua</label>\n\
                            </div>\n\
                        </td>\n\
                        <td>\n\
                            <button type="button" class="btn btn-danger btn-sm" onclick="removePegawai('+data.id+')"><i class="fas fa-trash"></i></button>\n\
                        </td>\n\
                    </tr>'
                );
            }
        });
    }

    //Check Ketua
    function checkKetua(){
        var set_ketua = $('.set_ketua').filter(':checked').length
        if (set_ketua == 1){
            $('.set_ketua:not(:checked)').attr('disabled', true);
            $('#nextButton').attr('disabled',false);
            $('#buttonAlert').hide();
        }else if (set_ketua == 0){
            $('.set_ketua:not(:checked)').attr('disabled', false);
            $('#nextButton').attr('disabled',true);
            $('#buttonAlert').show();
        }
        // console.log(set_ketua)
    }

    //Remove Row Pegawai
    function removePegawai(id){
        $('#table_row_pegawai'+id).remove()
    }

    //Reset Modal
    function resetModalPegawai(){
        $("#pegawaiModal .close").click()
        $('#tablePegawai tr').remove()
        $("#pegawai_unit_id option:selected").remove()
        $('#nama_pegawai').val('')
    }

    //Dismis Modal
    $('#pegawaiModal').on('hidden.bs.modal', function () {
        resetModalPegawai()
    });

    function addMahasiswa(id_mahasiswa){
        //Reset Modal Mahasiswa
        resetModalMahasiswa()

        var mahasiswaNo = parseInt($('#pegawaiNo').text())+parseInt(1);
        $.ajax({
            type: 'GET',
            url: document.location.origin + "/api/mahasiswa/add",
            data: {
                'id': id_mahasiswa,
            },
            success: function(data){
                // console.log(data)
                $('#table_anggota_mahasiswa').append(
                    '<tr id="table_row_mahasiswa'+data.id+'">\n\
                        <td>'+mahasiswaNo+'</td>\n\
                        <td>'+data.name+'\n\
                            <input type="hidden" name="mahasiwa_id[]" value="'+data.id+'">\n\
                        </td>\n\
                        <td>\n\
                            <div class="form-check">\n\
                                <input type="checkbox" class="form-check-input set_ketua" id="checkKetua'+data.id+'" name="set_ketua[]" value="'+data.id+'" onclick="checkKetua()">\n\
                                <label class="form-check-label" for="checkKetua'+data.id+'" onclick="checkKetua()"> Ketua</label>\n\
                            </div>\n\
                        </td>\n\
                        <td>\n\
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeMahasiswa('+data.id+')"><i class="fas fa-trash"></i></button>\n\
                        </td>\n\
                    </tr>'
                );
            }
        });
    }

    //Remove Row Mahasiswa
    function removeMahasiswa(id){
        $('#table_row_mahasiswa'+id).remove()
    }

    //Reset Modal
    function resetModalMahasiswa(){
        $("#mahasiswaModal .close").click()
        $('#tableMahasiswa tr').remove()
        $("#mahasiswa_unit_id option:selected").remove()
        $('#nama_mahasiswa').val('')
    }

    //Dismis Modal
    $('#mahasiswaModal').on('hidden.bs.modal', function () {
        resetModalMahasiswa()
    });

    function addNonCivitas(){
        var nama_noncivitas = $('#nama_noncivitas').val()
        var instansi = $('#instansi').val()
        var nonCivitasNo = parseInt($('#pegawaiNo').text())+parseInt(1);
        $.ajax({
            type: 'GET',
            url: document.location.origin + "/api/noncivitas/add",
            data: {
                'nama': nama_noncivitas,
                'instansi': instansi,
                'id': idGen.getId()
            },
            success: function(data){
                console.log(data)
                $('#table_anggota_noncivitas').append(
                    '<tr id="table_row_noncivitas'+data.id+'">\n\
                        <td>'+nonCivitasNo+'</td>\n\
                        <td>'+data.nama+'\n\
                            <input type="hidden" name="get_nama_noncivitas[]" value="'+data.nama+'">\n\
                        </td>\n\
                        <td>'+data.instansi+'\n\
                            <input type="hidden" name="get_instansi[]" value="'+data.instansi+'">\n\
                        </td>\n\
                        <td>\n\
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeNonCivitas('+data.id+')"><i class="fas fa-trash"></i></button>\n\
                        </td>\n\
                    </tr>'
                );
            }
        });

        //Reset Modal Mahasiswa
        resetModalNonCivitas()
    }

    //Remove Row Non Civitas
    function removeNonCivitas(id){
        $('#table_row_noncivitas'+id).remove()
    }

    //Reset Modal
    function resetModalNonCivitas(){
        $("#nonCivitasModal .close").click()
        $('#nama_noncivitas').val('')
        $('#instansi').val('')
    }

    //Dismis Modal
    $('#nonCivitasModal').on('hidden.bs.modal', function () {
        resetModalNonCivitas()
    });
</script>
@endpush
