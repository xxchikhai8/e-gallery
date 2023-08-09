@extends('layouts.layout')
@section('content')
@section('title', 'Upload Audio')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</div>
@endsection
<div class="container-fluid mt-4">
    <form action="/upload/audio/process" method="post" class="w-75 mx-auto rounded-2 padding" enctype="multipart/form-data">
        @csrf
        <h2 class="fw-bold text-center mb-3">Upload Audio</h2>
        <div class="w-75 mb-3 mx-auto"><hr></div>
        <input type="file" class="input-file border rounded-2 w-100" id="file-input" name="audio_file" accept=".mp3">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary pe-5 ps-5 w-100">Save</button>
        </div>
    </form>
</div>
@endsection
