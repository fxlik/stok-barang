@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header"><b>{{$proyek->nama_proyek}}</b> || Manajemen Barang Keluar </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-right">
                                    <form target="_blank" action="{{route('barangKeluar.cetak')}}" method="POST" data-toggle="validator">
                                        @csrf
                                        <input type="hidden" name="nama_proyek" value="{{$proyek->nama_proyek}}">
                                        <input type="hidden" name="jenis" value="Barang Keluar">
                                        <input type="hidden" name="kode_transaksi" value="{{$transaksi->kode_transaksi}}">
                                        <input type="hidden" name="tgl" value="{{date('d-m-Y', strtotime($transaksi->tgl))}}">
                                        <input type="hidden" name="transaksi_id" value="{{$transaksi->id}}">
                                        <button class="btn btn-sm btn-danger" type="submit">Cetak Laporan</button>
                                    </form>
                            </div>
                            <table>
                                <tr>
                                    <td><b>Nama Proyek</b></td>
                                    <td>: {{$proyek->nama_proyek}}</td>
                                </tr>
                                <tr>
                                    <td><b>Jenis/No. Transaksi</b></td>
                                    <td>: Barang Keluar / {{$transaksi->kode_transaksi}}</td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal</b></td>
                                    <td>: {{date('d-m-Y', strtotime($transaksi->tgl))}}</td>
                                </tr>
                            </table>
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <p><b>FORM BARANG KELUAR:</b></p>
                            <form class="form-horizontal" role="role" method="POST" action="{{route('submitTransaksiKeluar.post')}}" data-toggle="validator">
                                @csrf
                                <input type="hidden" name="transaksi_id" value="{{$transaksi->id}}">
                                <div class="box-body" id="daftar_barang">
                                    {{-- masih kosong karena belum ada pertanyaan --}}
                                    
                                </div>
                                <div class="box-footer" style="padding-bottom: 20px;">
                                    <div class="row">
                                        <div class="col-md-4 col-md-push-2">
                                            <button type="submit" class="btn btn-success yoa">SIMPAN</button>
                                            <button type="button" class="btn btn-warning" onclick="tambah_barang()">Tambah Barang</button>
                                        </div>	
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <p><b>DAFTAR BARANG:</b></p>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10px;">No.</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Masuk</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barangKeluar as $itam)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$itam->barang->nama_barang}}</td>
                                                <td>{{$itam->jumlah}}</td>
                                                <td>
                                                    <button onclick="location.href='{{route('barangKeluar.delete', $itam->id)}}'" class="btn btn-sm btn-danger"><img style="width:10px; color:darkcyan;" src="{{url('/svg/x.svg')}}"> Hapus</button>
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
    </div>
</div>
@endsection

@section('plugins')
<style type="text/css">
	.badge-remove {
		cursor: pointer;
	}
</style>
{{-- <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script> --}}
<script type="text/javascript">
    var jumlah_barang = 0;
    $(document).ready(function() {
        if(jumlah_barang == 0)
        {
            tambah_barang();			
        }
        
    });

    function tambah_barang() {
		var nomor = parseInt(jumlah_barang) + 1;
		var append = '<div class="form-group row" data-urutan="'+nomor+'"><label class="col-sm-2 control-label nomor">No. '+nomor+'</label><div class="col-sm-6"><select name="barang[]" class="form-control">@foreach($barang as $datang)<option value="{{$datang->id}}">{{$datang->nama_barang}}</option>@endforeach</select></div><div class="col-sm-2"><input name="jumlah[]" class="form-control" type="number" placeholder="Jumlah" required></div><label class="col-sm-2 badge-remove" onclick="hapus_barang($(this))"><span class="badge bg-red"><img style="width:17px;" src="{{url('/svg/x.svg')}}"></span></label></div>';
		$('#daftar_barang').append(append);
		jumlah_barang++;
	}

    function hapus_barang(obj) {
		var baris = obj.parent('div');
		var nomor_dihapus = baris.attr('data-urutan');
		baris.remove();
		for(i=parseInt(nomor_dihapus)+1; i<=jumlah_barang; i++)
		{
			var parent = $('#daftar_barang div[data-urutan="'+i+'"]');
			var nomor = i-1;
			parent.children('label.nomor').html('No. '+nomor);
			parent.attr('data-urutan', i-1);
		}
		jumlah_barang--;
	}

    if ($(".angun").val() === " ") {
        console.log('fuck');
    }
</script>
@endsection