<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\myCss.css') }}">
    <script src="https://www.youtube.com/iframe_api"></script>
    <title>Document</title>
    @stack('scripts')
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
{{-- <script>
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    var videos = {!! $videoId !!}; // Array videoId
    var player;
    var currentIndex = 0;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            videoId: videos[currentIndex],
            playerVars: {
                autoplay: 1,
                controls: 0,
                modestbranding: 1,
                rel: 0,
                fs: 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.playVideo();
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
            currentIndex++;
            if (currentIndex < videos.length) {
                player.loadVideoById(videos[currentIndex]);
            } else {
                // Semua video telah diputar
                window.location.href =
                    "http://127.0.0.1:8000/"; // Ganti dengan URL tujuan setelah selesai memutar semua video
            }
        }
    }

    onYouTubeIframeAPIReady();
</script> --}}


<script>
    var videos = {!! $videoId !!}; // Array videoId
    var player;
    var currentIndex = 0;

    function onYouTubeIframeAPIReady() {
        var storedIndex = localStorage.getItem("currentIndex");
        if (storedIndex !== null) {
            currentIndex = parseInt(storedIndex);
        }

        player = new YT.Player('player', {
            videoId: videos[currentIndex],
            playerVars: {
                autoplay: 1,
                controls: 0,
                modestbranding: 1,
                rel: 0,
                fs: 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    function onPlayerReady(event) {
        event.target.playVideo();
    }

    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED) {
            currentIndex++;
            if (currentIndex < videos.length) {
                setTimeout(function() {
                    window.location.href = "http://127.0.0.1:8000/";
                    localStorage.setItem("currentIndex", currentIndex.toString());
                }, 0); // Mengalihkan kembali ke halaman utama setelah video pertama selesai diputar
            } else {
                setTimeout(function() {
                    window.location.href = "http://127.0.0.1:8000/video";
                    localStorage.removeItem("currentIndex");
                }, 10 * 1000); // Mengalihkan ke halaman video setelah semua video diputar
            }
        }
    }

    onYouTubeIframeAPIReady();
</script>




</html>
