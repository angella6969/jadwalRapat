<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="5">

    <title>Meeting Room Schedule </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\myCss.css') }}">
</head>

<body>
    <header>
        {{-- <div class="row"> --}}
        {{-- <div class="col-md-2 mt-3 mb-3  " style="margin-left: 40px; "> --}}
        <img src="{{ asset('storage\images\lgo.png') }}" alt="" width="900">
        {{-- </div> --}}
        {{-- <div class="col-md-9 mt-3 mb-3">
                <h1>KEMENTRIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT <br> DIREKTORAT JENDRAL SUMBER DAYA AIR <BR> BALAI BESAR WILAYAH SUNGAI SERAYU OPAK</h1>
                    <H6> Jl.Solo Km.6 Yogyakarta 55281 Tlp.(0274) 489172 Fax.(0274) 489552 http://wwww.sda.pu.go.id/balai/bbwsserayuopak/</H6>
            </div> --}}
        {{-- </div> --}}
    </header>

</body>
<div class="container">
    <div class="d-flex justify-content-center mt-3">
        <h1>Jadwal Rapat BBWS Serayu Opak</h1>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Ruang</th>
                    <th scope="col">Mulai </th>
                    <th scope="col">Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{ $item->tittle }}</td>
                        <td> {{ $item->room }}</td>
                        <td> {{ $item->start }}</td>
                        <td> {{ $item->end }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3">
            {{ $jadwal->links() }}
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    // Refresh halaman setelah 5 detik
    setTimeout(function() {
        location.reload();
    }, 50000); // 5000 milidetik = 5 detik
</script>
<script>
    // Fungsi untuk mengalihkan halaman
    function redirectPage() {
      // Ganti URL sesuai dengan URL video yang ingin Anda tampilkan
      window.location.href = "http://127.0.0.1:8000/a";
    }
  
    // Mengalihkan halaman setiap 30 menit
    setInterval(redirectPage, 1000); // 30 menit * 60 detik * 1000 milidetik
  </script>

</html>
