<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\myCss.css') }}">
    <title>Document</title>
</head>

<body>

    <div class="ratio ratio-16x9">
        <div id="player"></div>
    </div>



</body>
<script src="https://www.youtube.com/player_api"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    var videoId = 'Zjue--KG4vM';


    // Fungsi callback ketika API telah dimuat
    function onYouTubePlayerAPIReady() {
        // Buat objek pemutar video YouTube
        var player = new YT.Player('player', {
            videoId: videoId,
            playerVars: {
                autoplay: 1, // Memulai pemutaran otomatis
                controls: 0, // Menyembunyikan kontrol pemutar video
                modestbranding: 1, // Menyembunyikan branding YouTube
                rel: 0, // Menonaktifkan video terkait
                fs: 1 // Aktifkan mode layar penuh
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // Fungsi callback ketika pemutar video siap
    function onPlayerReady(event) {
        event.target.playVideo(); // Memulai pemutaran video
        event.target.setPlaybackQuality('hd720'); // Mengatur kualitas video
        event.target.setLoop(true); // Mengatur pemutaran video dalam mode loop
        event.target.setPlaybackRate(1.5); // Mengatur kecepatan pemutaran video
        event.target.setVolume(100); // Mengatur volume video (dalam persen)
    }

    // Fungsi callback untuk menghandle perubahan status pemutar video
    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
            // Mengembalikan ke halaman awal setelah video selesai diputar
            window.location.href = "http://127.0.0.1:8000/";
        }
    }

    // Panggil fungsi untuk memulai inisialisasi pemutar video YouTube
    onYouTubePlayerAPIReady();
</script>


</html>
