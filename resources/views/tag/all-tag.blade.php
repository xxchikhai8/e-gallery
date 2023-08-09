@extends('layouts.layout')
@section('content')
@section('title', 'Tags')
@section('breadcrumb')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tag</li>
        </ol>
    </div>
@endsection
<div class="container-fluid mb-2 mt-1">
    <div class="text-center">
        <h3 class="mb-0 fw-bold">Tag</h3>
        <h6 class="mb-0">Total Tag: {{ $total }}</h6>
    </div>
</div>
@if ($total > 0)
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-3">
        @foreach ($tags as $tag)
            <a href="/tag/{{ $tag->tag_name }}" class="text-decoration-none">
                <div class="col">
                    <div class="tag">
                        <svg class="me-3" width="34" height="34"><use href="#tag" /></svg>
                        <h2>{{ ucwords(str_replace('-', ' ', $tag->tag_name)) }}</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@else
    <div class="container-fluid my-3">
        <div class="text-center no-result">
            <h5>No Result!</h5>
        </div>
    </div>
@endif
@endsection
