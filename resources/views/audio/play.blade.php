@extends('layouts.layout')
@section('content')
@section('title','iMusic')
@php
    $url = session()->get('urls');
    $song = session()->get('song');
@endphp
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</div>
@endsection
<div class="container-fluid">
    <div class="row h-100 mt-2">
        <div class="col-6">
            <div class="container-fluid">
                <div class="mt-3 text-center height vinyl mx-auto" id='vinyl'>
                    <img src="{{asset('assets/img/vinyl.png')}}" width="250" height="250">
                </div>
                <div class="m-2">
                    @if ($song!="")
                        <h4 class="text-center">{{$song}}</h4>
                    @else
                        <h4 class="text-center">Play</h4>
                    @endif

                    <h6 class="text-center">Unkown</h6>
                </div>
                <div class="w70 d-flex mx-auto align-items-end">
                    <div id="time-display" class="d-flex">
                        <span id="current-time">00:00</span>/<span id="total-duration">00:00</span>
                    </div>
                    <div id="seek-bar" class="mb-2 ms-2">
                        <div class="progress"></div>
                    </div>
                </div>
                {{-- <div class="row border  mx-auto">
                    <div class="col-2 text-center">sdds</div>
                    <div class="col-2 text-center">svds</div>
                    <div class="col-4 text-center d-flex">
                        <div class="centers">
                            <div id="control" class="pause">
                              <div class="border"></div>
                              <div class="play"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 text-center">dvds</div>
                    <div class="col-2 text-center">dvds</div>
                </div> --}}
                <div class="mt-3">
                    <audio id="audio-element" autoplay>
                        @if ($url!='')
                            <source src="storage/audio/{{$url}}" type="audio/mpeg">
                        @endif
                    </audio>
                </div>
                <div id="audio-controls" class="w75 mx-auto">
                    <button id="play-button" class="play-pause-button">Play</button>
                    <button id="pause-button" class="play-pause-button">Pause</button>
                    <input type="range" id="volume-slider" min="0" max="1" step="0.1" value="1">
                </div>

            </div>
        </div>
        <div class="col-6 pb-1">
            <div>
                <h4 class="text-center mt-1">Music List</h4>
            </div>
            <div class="container-fluid list-track pt-1">
                @foreach ($listAudio as $audio)
                    <div class="track-item border rounded-2 mb-2">
                        <a href="music/play/{{$audio->url}}" class="d-flex justify-content-start align-items-center track-music"><svg class="me-2" width=24 height=24><use href="#music" /></svg>{{$audio->audio_name}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const audioElement = document.getElementById("audio-element");
        const playButton = document.getElementById("play-button");
        const pauseButton = document.getElementById("pause-button");
        const volumeSlider = document.getElementById("volume-slider");
        const seekBar = document.getElementById("seek-bar");
        const currentTimeDisplay = document.getElementById("current-time");
        const totalDurationDisplay = document.getElementById("total-duration");
        let isSeeking = false;

        playButton.addEventListener("click", function () {
            audioElement.play();
        });

        pauseButton.addEventListener("click", function () {
            audioElement.pause();
        });

        volumeSlider.addEventListener("input", function () {
            audioElement.volume = volumeSlider.value;
        });

        audioElement.addEventListener("timeupdate", function () {
            const progress = (audioElement.currentTime / audioElement.duration) * 100;
            if (!isSeeking) {
                seekBar.querySelector(".progress").style.width = progress + "%";
            }
            const currentMinutes = Math.floor(audioElement.currentTime / 60);
            const currentSeconds = Math.floor(audioElement.currentTime % 60);
            currentTimeDisplay.textContent = `${currentMinutes.toString().padStart(2, '0')}:${currentSeconds.toString().padStart(2, '0')}`;
        });

        audioElement.addEventListener("loadedmetadata", function () {
            const totalMinutes = Math.floor(audioElement.duration / 60);
            const totalSeconds = Math.floor(audioElement.duration % 60);
            totalDurationDisplay.textContent = `${totalMinutes.toString().padStart(2, '0')}:${totalSeconds.toString().padStart(2, '0')}`;
        });

        seekBar.addEventListener("mousedown", function (e) {
            isSeeking = true;
            updateSeek(e);
        });

        seekBar.addEventListener("mousemove", function (e) {
            if (isSeeking) {
                updateSeek(e);
            }
        });

        seekBar.addEventListener("mouseup", function (e) {
            if (isSeeking) {
                updateSeek(e);
                isSeeking = false;
            }
        });

        function updateSeek(e) {
            const seekBarRect = seekBar.getBoundingClientRect();
            const clickPosition = e.clientX - seekBarRect.left;
            const seekPercentage = clickPosition / seekBarRect.width;
            const seekTime = audioElement.duration * seekPercentage;
            audioElement.currentTime = seekTime;
        }
    });
</script>
@endsection

