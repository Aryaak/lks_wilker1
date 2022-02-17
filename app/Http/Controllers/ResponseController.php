<?php

namespace App\Http\Controllers;

use App\Models\Response;

class ResponseController extends Controller
{
    public function store()
    {
        $input = request()->all();
        Response::create($input);
        return redirect()->back();
    }

    public function delete()
    {
        Response::where('id', request('id'))->delete();

        return redirect()->back();
    }
}
