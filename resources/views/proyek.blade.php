@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manajemen Proyek</div>

                <div class="card-body">
                    <div style="margin-bottom:10px;">
                        <a class="btn btn-md btn-success" href="#">Tambah Data Proyek</a>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 9px;">No.</th>
                                <th>Nama Proyek</th>
                                <th style="text-align:center;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proyek as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->nama_proyek}}</td>
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
@endsection
