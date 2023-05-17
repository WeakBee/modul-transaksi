<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Model Transaksi</title>
</head>
<body>
    @auth
    <section class="section-main">
        <nav class="py-3 mb-2">
            <div class="container d-flex align-items-center">
                <div class="me-auto d-flex align-items-center">
                    <img class="profile-pic" src="/assets/profile.jpg">
                    <div class="profile-data">
                        <p class="fw-semibold">{{$user['username']}}</p>
                        <p>{{$user['email']}}</p>
                    </div>
                </div>
    
                <form action="/logout" method="POST">
                    @csrf
                    <button class="button-pink">Logout</button>
                </form>
            </div>
        </nav>
        <div class="container container-main">
            <div class="buat-transaksi-box">
                <form action="/create-transaksi" method="POST">
                    @csrf
                    <div class="d-flex mb-3 align-items-center">
                        <h1 class="me-auto judul">Buat Transaksi</h1>
                        <div class="d-flex align-items-center">
                            <button class="button-pink">Tambah Transaksi +</button>
                        </div>
                    </div>
                    
                    <div class="d-flex buat-transaksi-input">
                        <div class="me-2">
                            <label for="nama_pembeli">Nama Pembeli</label><br>
                            <input id="nama_pembeli" name="nama_pembeli" type="text" placeholder="John">
                        </div>
                        <div class="me-2">
                            <label for="email_pembeli">Email Pembeli</label><br>
                            <input id="email_pembeli" name="email_pembeli" type="text" placeholder="john@example.com">
                        </div>

                        <div class="me-2">
                            <label for="nama_barang">Nama Barang</label><br>
                            <input id="nama_barang" name="nama_barang" type="text" placeholder="Keranjang"><br>
                        </div>
                        <div class="me-2">
                            <label for="harga_barang">Harga Barang</label><br>
                            <input id="harga_barang" name="harga_barang" type="number" placeholder="300000"><br>
                        </div>
                        <div>
                            <label for="jumlah_barang">Jumlah Barang</label><br>
                            <input id="jumlah_barang" name="jumlah_barang" type="number" min="1" max="20" placeholder="5">
                        </div>
                    </div>
                </form>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <div class="d-flex align-items-center mb-3">
                    <h2 class="me-auto judul">List Transaksi</h2> 
                    <div>
                        <a class="btn btn-info d-flex" href="/export-pdf">Export PDF &nbsp <img src="/assets/download-black.svg" width="14px"></a>
                    </div>
                    <div class="mx-2">
                        <a class="btn btn-success d-flex" href="/export-excel">Export Excel &nbsp <img src="/assets/download-white.svg" width="14px"></a>
                    </div>
                    <div>
                        <a class="btn btn-danger d-flex" href="/kirim-email">Kirim Email &nbsp <img src="/assets/send.svg" width="14px"></a>
                    </div>
                </div>
                <table class="table-main">
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Nama Pembeli</th>
                      <th>Email Pembeli</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                    @foreach($transaksi as $data)
                    <tr>
                        <td>{{$data['id_transaksi']}}</td>
                        <td>{{$data['nama_pembeli']}}</td>
                        <td>{{$data['email_pembeli']}}</td>
                        <td>{{$data['nama_barang']}}</td>
                        <td>{{$data->formatRupiah('harga_barang')}}</td>
                        <td>{{$data['jumlah_barang']}}</td>
                        <td>{{$data->formatRupiah('total_harga')}}</td>
                        <td class="aksi-btn">
                            <a class="btn btn-warning" href="/edit-transaksi/{{$data->id}}">Edit</a>
                            <form action="/delete-transaksi/{{$data->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    @else
    <section class="section-sign">
        <div class="container py-5">
            <div class="row row-sign d-flex bg-white">
                <div class="col-6 col-sign">
                    <div class="sign-box">
                        <h1 class="text-center">Selamat Datang</h1>
                        <p class="text-center mb-3">Silahkan isi beberapa data yang dibutuhkan</p>
                        <div class="button-indicator text-center">
                            <div class="sign-indicator sign-in-indicator aktif">Sign In</div>
                            <div class="sign-indicator sign-up-indicator">Sign Up</div>
                        </div>
                        <div class="sign-box-box login-box aktif">
                            <form action="/login" method="POST">
                                @csrf
                                <label for="loginusername">Username</label><br>
                                <input id="loginusername" name="loginusername" type="text"><br>
                                <label for="loginpassword">Password</label><br>
                                <input id="loginpassword" name="loginpassword" type="password"><br>
                                <button class="sign-button">Login</button>
                            </form>
                        </div>
                        <div class="sign-box-box signup-box">
                            <form action="/register" method="POST">
                                @csrf
                                <label for="email">Email</label><br>
                                <input id="email" name="email" type="text" ><br>
                                <label for="username">Username</label><br>
                                <input id="username" name="username" type="text"><br>
                                <label for="password">Password</label><br>
                                <input id="password" name="password" type="password"><br>
                                <button class="sign-button">Register</button>
                            </form>
                        </div>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="col-6 col-image-sign">
                    <img class="image-sign" src="/assets/e-commerce.jpg">
                </div>
            </div>
        </div>
    </section>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>