@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bread">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header">Manajemen Supplier</div>

                <div class="card-body">
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_supplier" class="btn btn-md btn-success" href="#">Tambah Supplier</a>
                    </div>

                    <div id="batalin" style="margin-bottom:10px; display:none;">
                        <a id="batal_tambah" class="btn btn-md btn-danger" href="#">Batalkan Tambah</a>
                    </div>
                    <div id="form_supplier" style="margin-bottom:12px; display:none;">
                        <form action="{{route('supplier.post')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Kode Supplier</label>
                                <input id="kode_supplier" type="text" name="kode_supplier" class="form-control" placeholder="Kode Supplier" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Supplier</label>
                                <input id="nama_supplier" type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nomor Kontrak</label>
                                <input id="nomor_kontrak" type="text" name="nomor_kontrak" class="form-control" placeholder="Nomor Kontrak" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <input id="alamat" type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telp.</label>
                                <input id="telp" type="text" name="telp" class="form-control" placeholder="Nomor Telepon" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success add" id="simpanBarang">Simpan</button>
                        </form>
                    </div>
                    {{-- buat edit --}}
                    <div id="batale" style="margin-bottom:10px; display:none;">
                        <a id="batal_edit" class="btn btn-md btn-danger" href="#">Batalkan Edit</a>
                    </div>
                    <div id="form_edit" style="margin-bottom:12px; display:none;">
                        <form action="{{route('supplier.update')}}" class="form-horizontal" role="form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Kode Supplier</label>
                                <input id="kode_suppliere" type="text" name="kode_suppliere" class="form-control" placeholder="Kode Supplier" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Supplier</label>
                                <input id="nama_suppliere" type="text" name="nama_suppliere" class="form-control" placeholder="Nama Supplier" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nomor Kontrak</label>
                                <input id="nomor_kontrake" type="text" name="nomor_kontrake" class="form-control" placeholder="Nomor Kontrak" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <input id="alamate" type="text" name="alamate" class="form-control" placeholder="Alamat" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telp.</label>
                                <input id="telpe" type="text" name="telpe" class="form-control" placeholder="Nomor Telepon" required>
                            </div>
                            <input type="hidden" name="supplier_id" id="supplier_id">
                            <button type="submit" class="btn btn-sm btn-success add" id="updateSupplier">Update</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 9px;">No.</th>
                                    <th>Kode Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>Nomor Kontrak</th>
                                    <th>Alamat</th>
                                    <th>Telp.</th>
                                    <th style="text-align:center;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sup as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->kode_supplier}}</td>
                                    <td>{{$data->nama_supplier}}</td>
                                    <td>{{$data->nomor_kontrak}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->telp}}</td>
                                    <td style="text-align:center;">
                                        <button id="wahh" data-id="{{$data->id}}" data-kodesupplier="{{$data->kode_supplier}}" data-namasupplier="{{$data->nama_supplier}}" data-nomorkontrak="{{$data->nomor_kontrak}}" data-alamat="{{$data->alamat}}" data-telp="{{$data->telp}}" class="wahh btn btn-sm btn-warning">Edit</button>
                                        <button id="delll" onclick="location.href='{{route('supplier.delete', $data->id)}}'" class="delll btn btn-sm btn-danger">Hapus</button>
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
    $(document).on('click', '#tambah_supplier', function(){
        // tampilkan form
        show(document.getElementById('form_supplier'));
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
        document.getElementById('kode_supplier').focus();
        // document.getElementById('wahh').disabled = true;
        $(".wahh").attr("disabled", true);
        $(".delll").attr("disabled", true);
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
        hide(document.getElementById('form_supplier'));
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
        $(".delll").attr("disabled", false);
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
        document.getElementById("kode_suppliere").value = $(this).data('kodesupplier');
        document.getElementById("nama_suppliere").value = $(this).data('namasupplier');
        document.getElementById("nomor_kontrake").value = $(this).data('nomorkontrak');
        document.getElementById("alamate").value = $(this).data('alamat');
        document.getElementById("telpe").value = $(this).data('telp');
        document.getElementById("supplier_id").value = $(this).data('id');
        $(".delll").attr("disabled", true);
        document.getElementById('kode_suppliere').focus();
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
        $(".delll").attr("disabled", false);
    });
</script>
@endsection
