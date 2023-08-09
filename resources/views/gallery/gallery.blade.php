@extends('layouts.layout')
@section('content')
@section('title', 'Gallery')
@section('breadcrumb')
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
        </ol>
    </div>
@endsection
<div class="container-fluid mb-2 mt-1">
    <div class="text-center">
        <h3 class="mb-0 fw-bold">Gallery</h3>
        <h6 class="mb-0">Total Images: {{ $total }}</h6>
    </div>
</div>
@if ($total > 0)
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 g-2">
        @foreach ($images as $image)
        {{-- @dd($image->tag()->pluck('tag_tag_id')) --}}
            <div class="col text-center">
                <figure class="figure">
                    <a href="/images/view/{{ $image->image_id }}" type="button" title="Click to View Image">
                        <div class="img-container">
                            <img data-src="{{ asset('storage/images' . '/' . $image->image_name) }}"
                                class="figure-img mb-0 img-fluid lazyload">
                        </div>
                    </a>
                </figure>
                <figcaption>
                    <?php
                        $user = \App\Models\User::where('username', $image->username)->value('avatar');
                    ?>
                    <div>
                        <a href="/user/{{ $image->username }}" class="user-of-img" target="_blank">
                            <img data-src="{{ asset('storage/avatar' . '/' . $user) }}" class="avatar-img lazyload">
                            {{ $image->username }}
                        </a>
                    </div>
                    <div>
                        <span>Tag:
                            @foreach ($image->tag()->pluck('tag_name') as $tag)
                                <a class="text-decoration-none" href="/gallery/filter/tag/{{ $tag }}">
                                    @if ($loop->index % 2 == 0)
                                        <span class="badge text-bg-primary rounded-pill fs-6 my-1">
                                            {{ ucwords(Str::replace('-', ' ', $tag)) }}
                                        </span>
                                    @endif
                                    @if ($loop->index % 2 == 1)
                                        <span class="badge text-bg-danger rounded-pill fs-6 my-1">
                                            {{ ucwords(Str::replace('-', ' ', $tag)) }}
                                        </span>
                                    @endif
                                    @if ($loop->index % 3 == 0)
                                        <span class="badge text-bg-warning rounded-pill fs-6 my-1">
                                            {{ ucwords(Str::replace('-', ' ', $tag)) }}
                                        </span>
                                    @endif
                                </a>
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                    </div>
                </figcaption>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mb-0 mt-3">
        {{ $images->links() }}
    </div>
@else
    <div class="container-fluid my-3">
        <div class="text-center no-result">
            <h5>No Result!</h5>
        </div>
    </div>
@endif
@endsection
