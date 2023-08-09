<?php

namespace App\Http\Controllers;


use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImgIntervention;

class GalleryController extends Controller
{
    public function indexGallery() {
        $images = Image::orderBy('created_at', 'desc');
        $total = $images->count();
        $images = $images->paginate(16, ['*'], 'p');
        return view('gallery.gallery', compact('images', 'total'));
    }

    public function uploadImage() {
        $tags = Tag::select('tag_id', 'tag_name')->get();
        return view('gallery.upload', compact('tags'));
    }

    public function upload(Request $request) {
        $this->validate($request, [
            'file_image' => 'max:102400|required',
            'tag' => 'required',
            'image_quality' => 'required',
        ]);
        $image = new Image;
        $image->image_id = date('dmYHis');
        $image_id = $image->image_id;
        $img_file = $request->file('file_image');
        if ($request->hasFile('file_image')) {
            $image_name = date('dmYHis');
            $img_file = ImgIntervention::make($img_file)->encode('webp', $request->input('image_quality'));
            $img_file->save(base_path('public/storage/images' . '/'. $image_name) . '.webp', $request->input('image_quality'));
        }
        $image->image_name = $image_name . '.webp';
        $image->username = Auth::user()->username;
        $image->save();
        $image_tag = Image::where('image_id', $image_id)->first();
        $image_tag->tag()->sync((array) $request->input('tag'));
        return redirect('upload/image');
    }
}
