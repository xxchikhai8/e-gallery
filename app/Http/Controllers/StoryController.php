<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function storyIndex() {
        return view('story.story-index');
    }

    public function newStoryIndex() {
        return view('story.new-story');
    }

    public function newChapter() {
        return view('story.new-chapter');
    }

    public function myStory() {
        return view('story.story-list-account');
    }

    public function postnewStory() {
        redirect();
    }
}
