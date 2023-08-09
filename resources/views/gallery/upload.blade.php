@extends('layouts.layout')
@section('content')
@section('title','Upload Image')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Login</li>
    </ol>
</div>
@endsection
<div class="container-fluid mt-4">
    <form action="/upload/image/process" method="post" class="w-75 mx-auto rounded-2 padding" enctype="multipart/form-data">
        @csrf
        <h2 class="fw-bold text-center mb-3">Upload Image</h2>
        <div class="w-75 mb-3 mx-auto"><hr></div>
        <input type="file" class="input-file border rounded-2 w-100" id="file-input" name="file_image" accept=".png, .jepg, .jpg, .webp">
        <div class="my-2 fw-bold">Image Tag:</div>
        <div class="my-1">
            <select class="select2 select-2" name="tag[]" multiple="multiple" data-placeholder="Select an Tag" onload="select2();">
                @foreach ($tags as $tag)
                    <option value="{{$tag->tag_id}}">{{ucwords(str_replace('-', ' ', $tag->tag_name))}}</option>
                @endforeach
            </select>
        </div>
        <div class="my-2 fw-bold">Image Quality:</div>
        <div class="my-1">
            <select class="select-2 ps-1" name="image_quality">
                <option value="50" selected>50%</option>
                <option value="75">75%</option>
                <option value="100">100%</option>
            </select>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary w-75">Save</button>
        </div>
    </form>
</div>
@endsection
