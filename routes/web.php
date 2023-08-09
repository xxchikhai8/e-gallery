<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\AuthenticaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:25, 1'])->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::post('/login', [AuthenticaController::class, 'login']);
    Route::get('/login', [AuthenticaController::class, 'getlogin'])->name('login');
    Route::get('/music', [AudioController::class, 'playMusic']);
    Route::get('/music/play/{url}', [AudioController::class, 'play']);
    Route::get('/upload/audio', [AudioController::class, 'uploadAudio']);
    Route::post('/upload/audio/process', [AudioController::class, 'upload']);
    Route::middleware(['auth'])->group(function () {
        Route::get('/tag', [TagController::class, 'allTag']);
        Route::get('/new/tag', [TagController::class, 'newTag']);
        Route::post('/new/tag/process', [TagController::class, 'postNewTag']);
        Route::get('/images/tag/{tag}/', [TagController::class, 'filterByTag']);
        Route::get('/story', [StoryController::class, 'storyIndex']);
        Route::get('/user/my-story', [StoryController::class, 'myStory']);
        Route::get('/gallery', [GalleryController::class, 'indexGallery']);
        Route::get('/upload/image', [GalleryController::class, 'uploadImage']);
        Route::post('/upload/image/process', [GalleryController::class, 'upload']);
        Route::get('/logout', [AuthenticaController::class, 'logout']);
        Route::get('/user/0', [AuthenticaController::class, 'getUser']);
        Route::get('/user/{username}', [AuthenticaController::class, 'viewUser']);
        Route::post('user/changes/avatar', [AuthenticaController::class,'updateAvatar']);

    });
});

