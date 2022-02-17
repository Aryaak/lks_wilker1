<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function read($id)
    {
        $data = News::find($id);
        $related = News::where('category_id', $data->category_id)->limit(3)->orderBy('id', 'DESC')->get();
        return view('pages.news.read', compact('data', 'related'));
    }

    public function edit($id)
    {
        $data = News::find($id);
        $categories = Category::all();

        return view('admin.pages.news.edit', compact('data', 'categories'));
    }

    public function detail($id)
    {
        $data = News::find($id);
        $categories = Category::all();

        return view('admin.pages.news.detail', compact('data', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.pages.news.create', compact('categories'));
    }

    public function store()
    {
        $input = request()->all();
        $input['user_id'] = \Auth::user()->id;
        $input['photo'] = \Storage::disk('s3')->put('lks/aryarizkytriputra', request()->file('photo'));
        // $input['photo'] = request()->file('photo')->store('news');
        \Session::flash('success', 'Data Berhasil Dibuat');
        News::create($input);
        return redirect('admin');
    }

    public function delete()
    {
        $data = News::find(request('id'));
        \Storage::disk('s3')->delete($data->photo);
        News::where('id', request('id'))->delete();
        \Session::flash('success', 'Data Berhasil Dihapus');
        return redirect()->back();
    }

    public function update()
    {
        $input = request()->except('_token', '_method');
        $input['user_id'] = \Auth::user()->id;
        if(request()->file('photo')){   
            $data = News::find($input['id']);
            \Storage::disk('s3')->delete($data->photo);
            $input['photo'] = \Storage::disk('s3')->put('lks/aryarizkytriputra', request()->file('photo'));
            // $input['photo'] = request()->file('photo')->store('news');
        }
        
        News::where('id', $input['id'])->update($input);
        \Session::flash('success', 'Data Berhasil Diubah');
        return redirect('admin');
    }

}
