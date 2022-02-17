<?php

namespace App\Http\Controllers;

use App\Models\News;

class BackendController extends Controller
{
    public function index()
    {
        $data = News::where('title', 'LIKE' , '%' . request('title') . '%')->orderBy('id', 'DESC')->get();
        return view('admin.pages.index', compact('data'));   
    }
}
