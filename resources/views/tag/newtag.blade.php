@extends('layouts.layout')
@section('content')
@section('title','Tag - New')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item"><a href="/tag" class="breadcrumb-items">Tags</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Tag</li>
    </ol>
</div>
@endsection
<div class="container-fluid mt-4">
    <form action="/new/tag/process" method="post" class="w-75 mx-auto rounded-2 padding">
        @csrf
        <h2 class="fw-bold text-center mb-3">New tag</h2>
        <div class="w-75 mb-3 mx-auto"><hr></div>
        <div class="form-floating mb-3 w-75 mx-auto">
            <input type="text" class="form-control border border-dark" id="tagInput" name="tag" placeholder="Tag"
                required oninvalid="this.setCustomValidity('Please Enter Tag!')">
            <label for="tagInput" class="placeholders"><svg class="svgsub me-1 " width="20" height="20"><use href="#tag"></svg>Tag</label>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary w-75">Save</button>
        </div>
    </form>
</div>
@endsection
