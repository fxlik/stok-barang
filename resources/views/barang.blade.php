@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barang</li>
                    </ol>
                </nav>
            </div>
            
            <div class="card">
                <div class="card-header">Manajemen Barang</div>

                <div class="card-body">
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_barang" class="btn btn-md btn-success" href="#">Tambah Barang</a>
                    </div>

                    <div id="batalin" style="margin-bottom:10px; display:none;">
                        <a id="batal_tambah" class="btn btn-md btn-danger" href="#">Batalkan Tambah</a>
                    </div>
                    <div id="form_barang" style="margin-bottom:12px; display:none;">
                        <form action="{{route('barang.post')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Kode Barang</label>
                                <input id="kode_barang" type="text" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Barang</label>
                                <input id="nama_barang" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Satuan</label>
                                <input id="satuan" type="text" name="satuan" class="form-control" placeholder="Satuan" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>
                    {{-- buat edit --}}
                    <div id="batale" style="margin-bottom:10px; display:none;">
                        <a id="batal_edit" class="btn btn-md btn-danger" href="#">Batalkan Edit</a>
                    </div>
                    <div id="form_edit" style="margin-bottom:12px; display:none;">
                        <form action="{{route('barang.update')}}" class="form-horizontal" role="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Kode Barang</label>
                                <input id="kode_barange" type="text" name="kode_barange" class="form-control" placeholder="Kode Barang" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Barang</label>
                                <input id="nama_barange" type="text" name="nama_barange" class="form-control" placeholder="Nama Barang" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Satuan</label>
                                <input id="satuane" type="text" name="satuane" class="form-control" placeholder="Satuan" required>
                            </div>
                            <input type="hidden" name="barang_id" id="barang_id">
                            <button type="submit" class="btn btn-sm btn-success add" id="updateBarang">Update</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 9px;">No.</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th style="text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->kode_barang}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->satuan}}</td>
                                    <td style="text-align:center;">
                                        <button id="wahh" data-id="{{$data->id}}" data-kodebarang="{{$data->kode_barang}}" data-namabarang="{{$data->nama_barang}}" data-satuan="{{$data->satuan}}" class="wahh btn btn-sm btn-warning">Edit</button>
                                        <button id="dell" onclick="location.href='{{route('barang.delete', $data->id)}}'" class="dell btn btn-sm btn-danger">Hapus</button>
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
    $(document).on('click', '#tambah_barang', function(){
        // tampilkan form
        show(document.getElementById('form_barang'));
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
        document.getElementById('kode_barang').focus();
        // document.getElementById('wahh').disabled = true;
        $(".wahh").attr("disabled", true);
        $(".dell").attr("disabled", true);
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
        hide(document.getElementById('form_barang'));
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
        $(".dell").attr("disabled", false);
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
        document.getElementById("kode_barange").value = $(this).data('kodebarang');
        document.getElementById("nama_barange").value = $(this).data('namabarang');
        document.getElementById("satuane").value = $(this).data('satuan');
        document.getElementById("barang_id").value = $(this).data('id');
        $(".dell").attr("disabled", true);
        document.getElementById('kode_barange').focus();
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
        $(".dell").attr("disabled", false);
    });
</script>
@endsection
