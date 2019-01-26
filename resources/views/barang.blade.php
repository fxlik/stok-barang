@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manajemen Barang</div>

                <div class="card-body">
                    <div style="margin-bottom:10px;">
                        <a id="tambah_barang" class="btn btn-md btn-success" href="#">Tambah Barang</a>
                    </div>
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
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>

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

<div id="modal-form" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" role="form">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-3">Kode Barang</label>
                        <div class="col-sm-9">
                            <input id="kode_barang" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3">Nama Barang</label>
                        <div class="col-sm-9">
                            <input id="nama_barang" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3">Satuan</label>
                        <div class="col-sm-9">
                            <input id="satuan" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-md btn-danger" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-md btn-success add" id="simpanBarang" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('plugins')
<script type="text/javascript">
    $(document).on('click', '#tambah_barang', function(){
        $('.modal-title').text("Tambah Barang");
        $('#modal-form').modal('show');
    });


    $('.modal-footer').on('click', '.add', function(e) {
        if(!e.isDefaultPrevented()){
            $.ajax({
                type: 'POST',
                url: '{{url('postBarangdd')}}',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'kode_barang': $('#kode_barang').val(),
                    'nama_barang': $('#nama_barang').val(),
                    'satuan': $('#satuan').val()
                },
                success: function(data){
                    console.log('data');
                    $('#modal-form').modal('hide');
                    window.location.reload();
                },
                error: function(){
                    console.log('fafa');
                }
            });
        }
    });
</script>
@endsection
