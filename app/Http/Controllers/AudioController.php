<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audio;
use Illuminate\Support\Facades\DB;

class AudioController extends Controller
{
    public function playMusic() {
        $listAudio = DB::table('audio')->select('audio_name', 'url')->get();
        return view('audio.play', compact('listAudio'));
    }

    public function uploadAudio() {
        return view('audio.upload');
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'audio_file' => 'max:102400|required',
        ]);
        $audio = new Audio;
        if ($request->hasfile('audio_file')) {
            $audio_file = $request->file('audio_file');
            $audio_name = $audio_file->getClientOriginalName();
            $url = str_replace(' ', '-', $audio_name);
            $url = str_replace('.mp3', '', $url);
            $audio_file->move('storage/audio/' ,  $audio_name);
        };
        if (!DB::table('audio')->where('audio_name', $audio_name)->exists())
        {
            $audio->audio_id = date("dmYHis");
            $audio->audio_name = $audio_name;
            $audio->url = $url;
            $audio->username = "xxchikhai9";
            $audio->save();
        }
        return redirect('/upload/audio');
    }

    public function play(Request $request, $url) {
        $audio_name = $url;
        $url = str_replace('-', ' ', $url);
        $url = $url . '.mp3';
        $song = Audio::where('url', $audio_name)->value('audio_name');
        $song = str_replace('.mp3', '', $song);
        return redirect('/music')->with(['urls' => $url, 'song' => $song]);
    }
}
