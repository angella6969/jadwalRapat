<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Meeting Room Schedule </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\myCss.css') }}">

    <style>
        body {
            background-image: url("{{ asset('images/Switzerland.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>


<body>


    <div class="container">
        <div class="mt-3"><br>
            <div class="position-relative mt-3">
                <img class="position-absolute top-0 start-0" src="{{ asset('images/1 Logo BBWS SO -3D.png') }}"
                    alt="" width="200">
                <img class="position-absolute top-0 end-0" src="{{ asset('images/Logo_PUPR.png') }}" alt=""
                    width="250">
            </div>

            <div class="table-responsive-sm mt-3">
                <table class="table table-striped table-sm my-table table-bordered">
                    <label for="" class="d-flex justify-content-center"> <br>
                        <h1 class="">Agenda Penggunaan Ruang Rapat <br></h1>
                    </label>
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Ruang</th>
                            <th scope="col" class="text-center">Hari</th>
                            <th scope="col" class="text-center">Tanggal</th>
                            <th scope="col" class="text-center">Waktu</th>
                            <th scope="col" class="text-center">Pembahasan</th>
                            <th scope="col" class="text-center">Penyelenggara</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($jadwal as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
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
    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    function redirectPage() {
        window.location.href = "http://192.168.99.24:8080/video";
    }

    setInterval(redirectPage, 10 * 1000);
</script>

</html>
