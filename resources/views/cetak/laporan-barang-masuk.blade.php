<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN BARANG MASUK</title>
	<style type="text/css">			
		table {
    		border-collapse: collapse;
		}
		table, th, td {
    		border: 1px solid black;
		}
	</style>
</head>
<body>
    <div class="format">
    </div>
    
    <h5 style="text-align: center; font-size: 14; text-decoration:underline;">LAPORAN BARANG MASUK</h5>

	
	<div style="clear: both;"><br></div>
    
    
	<div class="tabel-data">
        <table style="width:720px; border: none !important;">
            <thead>
                <tr style="border: none;">
                    <th style="border: none;"></th>
                    <th style="border: none;"></th>
                </tr>
            </thead>
            <tbody>
                <tr style="border: none;">
                    <td style="width:30%; border: none;">
                        <p style="margin: 1px;">Nama Proyek</p>
                        <p style="margin: 0;">Jenis/No. Transaksi</p>
                        <p style="margin: 0;">Tanggal</p>
                    </td>
                    <td style="border: none;">
                        <p style="margin: 0;">: {{$nama_proyek}}</p>
                        <p style="margin: 0;">: {{$jenis}} / {{$kode_transaksi}}</p>
                        <p style="margin: 0;">: {{$tgl}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="clear: both;"><br></div>
        <table style="width:720px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangMasuk as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->barang->nama_barang}}</td>
                        <td>{{$data->supplier->nama_supplier}}</td>
                        <td>{{$data->jumlah}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</body>
</html>