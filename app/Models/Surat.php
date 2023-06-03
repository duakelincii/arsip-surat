<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable =  ['name','category_id','file_kk','file_akte','file_ktp','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
