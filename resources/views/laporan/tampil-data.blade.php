<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>laporan</title>
  </head>
  <body>
    <h1 class="text-center">Data Kasus </h1>
    <div class="container">
        <div class="row justify-between" style="border: 2px solid black; " >
            <div class="col-4">
                <p>Hallo {{ $data->pendamping->nama}}</p>
                <ul>
                    <li>Nama Korban    : {{$data->nama}}</li>
                    <li>Alamat         : {{$data->kecamatan->nama}}</li>
                </ul>
                <p>Anak ini Menjadi Korban dari kasus {{$data->category_laporan->jenis_laporan}} yang terjadi <br>
                    pada {{$data->created_at}}, kasus ini terjadi di {{ $data->kecamatan->nama}}, kasus ini <br>
                    sudah ditangani oleh pihak P2TP3A dan di dampingi oleh {{$data->pendamping->nama}}
                </p>
            </div>
            <div class="col-4 mb-2 mt-2 position-absolute top-0 end-0">
              <img src="{{ asset('tambahfoto/'.$data->foto)}}" alt="" style="width: 150px; height:200px">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>