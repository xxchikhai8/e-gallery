<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tag;

class IndexController extends Controller
{
    public function index() {
        return view("index");
    }
}
