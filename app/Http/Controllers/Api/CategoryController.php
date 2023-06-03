<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['category'] = Category::all();
        return ResponseFormatter::success([$data],200);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['created_at'] = Carbon::now();
        $category = Category::create($data);
        return ResponseFormatter::success([$category],200);
    }

}
