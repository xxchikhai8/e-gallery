@extends('layouts.layout')
@section('content')
@section('title','Manage Account')
@section('breadcrumb')
<div aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-items">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manager Account</li>
    </ol>
</div>
@endsection
<div class="container-fluid my-3 d-none d-lg-block d-sm-block">
    <div class="row">
        <div class="col-4 text-center border-right">
            <figure class="figure">
                <div class="img-container profile-epic">
                    <img data-src="{{asset('storage/avatar' . '/' . Auth::user()->avatar)}}" class="avatar lazyload">
                    <div class="change-avatar" id="change-avatar" type="button" data-bs-toggle="modal" data-bs-target="#updateAvatarModal">
                        <span>
                            <svg width="32" height="32">
                                <use href="#camera">
                            </svg>
                        </span>
                        <span class="edit-avatar-text">Edit Avatar</span>
                    </div>
                </div>
            </figure>
        </div>
        <div class="col-8">
            sdvsd
        </div>
    </div>
</div>
<div class="container-fluid my-3 border d-block d-lg-none d-sm-none">
    <div>
        Le CHi khai
    </div>

</div>
<div class="modal fade" id="updateAvatarModal" tabindex="-1" aria-labelledby="updateAvatarModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark text-uppercase">Update Avatar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="changes/avatar" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <img id='viewImage' class="max-size my-2"/>
                    <input type="file" class="border border-dark text-dark rounded-2 w-100 mb-3" name="avatar" accept=".png, .jepg, .jpg, .webp" id="changeAvatar" onchange="fileLoaded(event)">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary cancel-button" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary save-button">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

