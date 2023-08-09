@extends('layouts.layout')
@section('content')
@section('title', 'Gallery By Tag')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item"><a href="/gallery" class="breadcrumb-items">Gallery</a></li>
        <li class="breadcrumb-item active" aria-current="page">View</li>
    </ol>
</div>
@endsection
@endsection
