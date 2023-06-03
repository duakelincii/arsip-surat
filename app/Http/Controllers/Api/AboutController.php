<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return ResponseFormatter::success([$about],200);
    }

    public function store(Request $request)
    {
        $about = About::create($request->all());
        return ResponseFormatter::success([$about],200);
    }

    public function update(Request $request)
    {
        $item = About::findOrFail($request->id);
        $item->update($request->all());
        return ResponseFormatter::success([$item],200);
    }
}
