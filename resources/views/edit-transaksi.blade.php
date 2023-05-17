<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Edit Transksi</title>
</head>
<body>
    <section class="section-main py-5">
        <div class="container container-main">
            <a class="kembali" href="/"><- Kembali</a>
            <h1 class="judul mb-3">Edit Transaksi {{$data->id_transaksi}}</h1>

            <form action="/edit-transaksi/{{$data->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex buat-transaksi-input mb-3">
                    <div class="me-2">
                        <label for="nama_pembeli">Nama Pembeli</label><br>
                        <input id="nama_pembeli" name="nama_pembeli" type="text" value="{{$data->nama_pembeli}}">
                    </div>
                    <div class="me-2">
                        <label for="email_pembeli">Email Pembeli</label><br>
                        <input id="email_pembeli" name="email_pembeli" type="text" value="{{$data->email_pembeli}}">
                    </div>
                    <div class="me-2">
                        <label for="nama_barang">Nama Barang</label><br>
                        <input id="nama_barang" name="nama_barang" type="text"  value="{{$data->nama_barang}}"><br>
                    </div>
                    <div class="me-2">
                        <label for="harga_barang">Harga Barang</label><br>
                        <input id="harga_barang" name="harga_barang" type="number" value="{{$data->harga_barang}}"><br>
                    </div>
                    <div>
                        <label for="jumlah_barang">Jumlah Barang</label><br>
                        <input id="jumlah_barang" name="jumlah_barang" type="number" min="1" max="20" value="{{$data->jumlah_barang}}">
                    </div>
                </div>
                <button class="save-changes">Simpan Perubahan</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>