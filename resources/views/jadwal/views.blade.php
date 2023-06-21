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

    <style>
        body {
            background-image: url("{{ asset('storage/images/Switzerland.png') }}"); 
            background-size: cover;
            /* Mengatur gambar agar sesuai dengan ukuran halaman */
            background-position: center;
            /* Posisi gambar di tengah-tengah halaman */
        }
    </style>
</head>

<body>
    {{-- <header>
        {{-- <div class="row"> --}}
        {{-- <div class="col-md-2 mt-3 mb-3  " style="margin-left: 40px; "> --}}
        {{-- <img src="{{ asset('storage\images\lgo.png') }}" alt="" width="900"> --}}
        {{-- </div> --}}
        {{-- <div class="col-md-9 mt-3 mb-3">
                <h1>KEMENTRIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT <br> DIREKTORAT JENDRAL SUMBER DAYA AIR <BR> BALAI BESAR WILAYAH SUNGAI SERAYU OPAK</h1>
                    <H6> Jl.Solo Km.6 Yogyakarta 55281 Tlp.(0274) 489172 Fax.(0274) 489552 http://wwww.sda.pu.go.id/balai/bbwsserayuopak/</H6>
            </div> --}}
        {{-- </div> --}}
    {{-- </header> --}} 

</body>
<div class="container">
    <div >
        <h1 class="d-flex justify-content-center mt-3">Agenda Penggunaan Ruang Rapat</h1>
        <h4 class="d-flex justify-content-center mb-3">BBWS Serayu Opak - Jl.Solo Km.6 Yogyakarta</h4>
    </div>
    <div class="table-responsive-sm mt-3">
        <table class="table table-striped table-sm my-table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center" >No</th>
                    <th scope="col" class="text-center" >Ruang</th>
                    <th scope="col" class="text-center" >Hari</th>
                    <th scope="col" class="text-center" >Tanggal</th>
                    <th scope="col" class="text-center" >Waktu</th>
                    <th scope="col" class="text-center" >Pembahasan</th>
                    <th scope="col" class="text-center" >Penyelenggara</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($jadwal as $item)
                    <tr>
                        <td class="text-center" >{{ $loop->iteration }}</td>
                        <td> {{ $item->room }}</td>
                        <td> {{ Carbon\Carbon::parse($item->days)->translatedFormat('l') }}</td>
                        <td> {{ Carbon\Carbon::parse($item->days)->translatedFormat('d F Y') }}</td>
                        <td> {{ $item->time }}</td>
                        <td> {{ $item->tittle }}</td>
                        <td> {{ $item->by }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="position-relative mt-3">
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
        window.location.href = "http://127.0.0.1:8000/video";
    }

    // Mengalihkan halaman setiap 30 menit
    setInterval(redirectPage, 1000); // 30 menit * 60 detik * 1000 milidetik
</script>

</html>
