@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{$proyek->nama_proyek}}</b> || Manajemen Barang Masuk </div>

                <div class="card-body">
                    <div id="tombolan" style="margin-bottom:10px;">
                        <a id="tambah_transaksi" class="btn btn-md btn-primary" href="#">Transaksi Baru</a>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div id="form_transaksi" style="display:none;">
                                <button style="margin-bottom:8px;" id="batal_transaksi" class="btn btn-md btn-danger">Batalkan Transaksi</button>
                                <form action="{{route('transaksi.post')}}" class="form-horizontal" role="form" data-toggle="validator" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        {{-- <label class="control-label">Tanggal Transaksi</label> --}}
                                        <input id="tgl" data-provide="datepicker" type="text" name="tgl" class="form-control pickadate-indonesia" placeholder="Tanggal Transaksi" required>
                                    </div>
                                    <input type="hidden" name="proyek_id" value="{{$proyek->id}}">
                                    <button type="submit" class="btn btn-sm btn-primary add" id="buatTransaksiMasuk">Buat Transaksi</button>
                                </form>
                            </div>
                            <div style="margin-top:12px;" class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $item)
                                        <tr>
                                            
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kode_transaksi}}</td>
                                            <td>{{$item->tgl}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{route('kelolaTransaksi.masuk', [$proyek->id, $item->id])}}">Kelola</a>
                                                <button class="btn btn-sm btn-danger" onclick="location.href='{{route('transaksiMasuk.delete', $item->id)}}'">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- <p style="color:royalblue; font-size:16px;">Daftar Transaksi Barang Masuk</p> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script type="text/javascript" src="{{ asset('js/picker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/picker.date.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
$(document).on('click', '#tambah_transaksi', function(){
    // tampilkan form transaksi baru
    show(document.getElementById('form_transaksi'));
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
});

$(document).on('click', '#batal_transaksi', function(){
    // tampilkan button tambah transaksi
    show(document.getElementById('tombolan'));
    function show(elements, specifiedDisplay){
        elements = elements.length ? elements : [elements];
        for (var index = 0; index < elements.length; index++) {
            elements[index].style.display = specifiedDisplay || 'block';
        }
    }
    hide(document.getElementById('form_transaksi'));
    function hide (elements) {
        elements = elements.length ? elements : [elements];
        for (var index = 0; index < elements.length; index++) {
            elements[index].style.display = 'none';
        }
    }
});
</script>

<script type="text/javascript">
    $(function () {
        $("#tgl").datepicker({
            autoclose:true,
            orientation: "bottom",
            format: "yyyy-mm-dd"
        });
    });
</script>
@endsection
