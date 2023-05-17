<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 10px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Transaksi</h1>

<table id="customers">
  <tr>
    <th>ID Transaksi</th>
    <th>Nama Pembeli</th>
    <th>Email Pembeli</th>
    <th>Nama Barang</th>
    <th>Harga Barang</th>
    <th>Jumlah Barang</th>
    <th>Total Harga</th>
  </tr>
  @foreach ($data as $row)
  <tr>
    <td>{{$row['id_transaksi']}}</td>
    <td>{{$row['nama_pembeli']}}</td>
    <td>{{$row['email_pembeli']}}</td>
    <td>{{$row['nama_barang']}}</td>
    <td>{{$row->formatRupiah('harga_barang')}}</td>
    <td>{{$row['jumlah_barang']}}</td>
    <td>{{$row->formatRupiah('total_harga')}}</td>
  </tr>
  @endforeach
</table>

</body>
</html>