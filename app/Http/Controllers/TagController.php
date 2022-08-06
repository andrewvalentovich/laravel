<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tag = Tag::find(1);
        dd($tag->articles);
        return view('tags.index', compact('tags')); // передаём переменную articles в blade, которую
    }
}
