<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Images;
use Intervention\Image\Facades\Image as ImgIntervention;

class AuthenticaController extends Controller
{
    public function getlogin() {
        return view('auth.login');
    }

    public function getUser() {
        return view('auth.account');
    }

    public function getSetting() {
        return view('auth.setting');
    }

    public function viewUser(Request $request, $username) {
        $user = $username;
        return view('auth.view-user', compact('user'));
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $remenber_me =  $request->has('remember_me') ? true : false;
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $remenber_me)) {
            return redirect('/')->with('notify', 'Login Successfullt!');
        }
        else {
            return redirect('/login')->with('notify', 'Login Fail! Please Check Usename and Password.');
        }
    }

    public function updateAvatar(Request $request) {
        $this->validate($request, [
            'avatar' => 'max:102400|required',
        ]);
        $img_file = $request->file('avatar');
        if (Auth::check() && $request->hasFile('avatar')) {
            $user = User::where('username', Auth::user()->username)->first();
            $image_name = Auth::user()->username;
            $img_file = ImgIntervention::make($img_file)->encode('webp', 50);
            $img_file->save(base_path('public/storage/avatar' . '/'. $image_name) . '.webp', 50);
        }
        $user->avatar = $image_name . '.webp';
        $user->update();
        return redirect('/user/0');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect($request->input('current_page'));
    }
}
