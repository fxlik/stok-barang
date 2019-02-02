@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manajemen Proyek</div>

                <div class="card-body">
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_proyek" class="btn btn-md btn-success" href="#">Tambah Proyek</a>
                    </div>

                    <div id="batalin" style="margin-bottom:10px; display:none;">
                        <a id="batal_tambah" class="btn btn-md btn-danger" href="#">Batalkan Tambah</a>
                    </div>
                    <div id="form_proyek" style="margin-bottom:12px; display:none;">
                        <form action="{{route('proyek.post')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Nama Proyek</label>
                                <input id="nama_proyek" type="text" name="nama_proyek" class="form-control" placeholder="Nama Proyek" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success add" id="simpanProyek">Simpan</button>
                        </form>
                    </div>
                    {{-- buat edit --}}
                    <div id="batale" style="margin-bottom:10px; display:none;">
                        <a id="batal_edit" class="btn btn-md btn-danger" href="#">Batalkan Edit</a>
                    </div>
                    <div id="form_edit" style="margin-bottom:12px; display:none;">
                        <form action="{{route('proyek.update')}}" class="form-horizontal" role="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Nama Proyek</label>
                                <input id="nama_proyeke" type="text" name="nama_proyeke" class="form-control" placeholder="Nama Proyek" required>
                            </div>
                            <input type="hidden" name="proyek_id" id="proyek_id">
                            <button type="submit" class="btn btn-sm btn-success add" id="updateProyek">Update</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead>
                                <tr>
                                    <th style="width: 9px;">No.</th>
                                    <th>...</th>
                                    <th>Nama Proyek</th>
                                    <th style="text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyek as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <button onclick="location.href='{{route('barangMasuk.tampil', $data->id)}}'" class="dell btn btn-sm btn-primary" >Barang Masuk</button>
                                        <button onclick="location.href='{{route('barangKeluar.tampil', $data->id)}}'" class="dell btn btn-sm btn-success" >Barang Keluar</button>
                                    </td>
                                    <td>{{$data->nama_proyek}}</td>
                                    <td style="text-align:center;">
                                        <button id="wahh" data-id="{{$data->id}}" data-namaproyek="{{$data->nama_proyek}}" class="wahh btn btn-sm btn-warning">Edit</button>
                                        <button id="deleteProyeknih" onclick="location.href='{{route('proyek.delete', $data->id)}}'" class="dell btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
<script type="text/javascript">
    $(document).on('click', '#tambah_proyek', function(){
        // tampilkan form
        show(document.getElementById('form_proyek'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }

        // sembunyikan tombol tambah
        hide(document.getElementById('tombolan'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }

        // tampilkan tombol batal
        show(document.getElementById('batalin'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }
        document.getElementById('nama_proyek').focus();
        // document.getElementById('wahh').disabled = true;
        $(".wahh").attr("disabled", true);
        $(".dell").attr("disabled", "disabled");
    });

    $(document).on('click', '#batal_tambah', function(){
        // tampilkan tombol tambah
        show(document.getElementById('tombolan'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }

        // sembunyikan form tambah
        hide(document.getElementById('form_proyek'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }

        // sembunyikan tombol batal
        hide(document.getElementById('batalin'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }
        $(".wahh").attr("disabled", false);
        $(".dell").removeAttr("disabled");
    });


    // KETIKA TOMBOL EDIT DITEKAN
    $(document).on('click', '#wahh', function(){
        // tampilkan form
        show(document.getElementById('form_edit'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }
        // sembunyikan tombol tambah
        hide(document.getElementById('tombolan'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }
        // tampilkan tombol batal edit
        show(document.getElementById('batale'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }
        document.getElementById("nama_proyeke").value = $(this).data('namaproyek');
        document.getElementById("proyek_id").value = $(this).data('id');
        $(".dell").attr("disabled", "disabled");
        document.getElementById('nama_proyeke').focus();
    });

    $(document).on('click', '#batale', function(){
        // tampilkan tombol tambah
        show(document.getElementById('tombolan'));
        function show(elements, specifiedDisplay){
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = specifiedDisplay || 'block';
            }
        }
        // sembunyikan form tambah
        hide(document.getElementById('form_edit'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }

        // sembunyikan tombol batal
        hide(document.getElementById('batale'));
        function hide (elements) {
            elements = elements.length ? elements : [elements];
            for (var index = 0; index < elements.length; index++) {
                elements[index].style.display = 'none';
            }
        }
        $(".dell").removeAttr("disabled");
    });
</script>
@endsection
