<?php

namespace App\Http\Controllers;

use App\Models\News;

class FrontendController extends Controller
{
    public function index()
    {
        $data = News::where('title', 'LIKE' , '%' . request('title') . '%')->orderBy('id', 'DESC')->get();
        return view('pages.index', compact('data'));
    }
}
