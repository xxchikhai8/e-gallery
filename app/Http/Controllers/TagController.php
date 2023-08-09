<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function allTag() {
        $tags = Tag::orderBy('tag_name', 'asc')->get();
        $total = $tags->count();
        return view('tag.all-tag', compact('tags', 'total'));
    }
    public function filterByTag(Request $request, $tag) {
        return view('gallery.gallerybytag', compact('tag'));
    }

    public function newTag() {
        return view('tag.newtag');
    }

    public function postNewTag(Request $request) {
        $this->validate($request, [
            'tag'=>'required'
        ]);
        $tag = new Tag;
        $tag->tag_id = date('mdYHis');
        $tag->tag_name = strtolower(str_replace(' ', '-', $request->input('tag')));
        $tag->save();
        return redirect('/new/tag');
    }
}
