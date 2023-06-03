<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'user')
        {
            $surat = Surat::where('user_id',Auth::user()->id)->get();
        }else{
            $surat = Surat::all();
        }
        return ResponseFormatter::success([$surat],200);
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            if ($request->file('file_kk')) {
                $file = $request->file('file_kk');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $file_kk = Auth::user()->name.'-'.time().'.'. $extension;
                $file->move(public_path('/uploads/file_kk'), $file_kk);
            }

            if ($request->file('file_akte')) {
                $file = $request->file('file_akte');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $file_akte = Auth::user()->name.'-'.time().'.'. $extension;
                $file->move(public_path('/uploads/file_akte'), $file_akte);
            }

            if ($request->file('file_ktp')) {
                $file = $request->file('file_ktp');
                $extension = $file->getClientOriginalExtension(); // you can also use file name
                $file_ktp = Auth::user()->name.'-'.time().'.'. $extension;
                $file->move(public_path('/uploads/file_ktp'), $file_ktp);
            }

            $surat = Surat::create([
                'user_id' => $request->user_id,
                'name'  => $request->name,
                'category_id'  => $request->category_id,
                'file_kk'  => '/uploads/file_kk/'.$file_kk,
                'file_akte'  => '/uploads/file_akte/'.$file_akte,
                'file_ktp'  => '/uploads/file_ktp/'.$file_ktp,
            ]);
            DB::commit();
            return ResponseFormatter::success([$surat],200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ResponseFormatter::error([$th],500);
        }
    }
}
