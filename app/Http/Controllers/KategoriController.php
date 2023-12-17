<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
class KategoriController extends Controller
{
    public function produkByKategori($id)
    {
        
       //menampilkan data sesua kategori yang diminta user
        return view('user.kategori', [
            'produks' => Product::where('categories_id',$id)->paginate(10),
            'categories' => Categories::whereId($id)->first()
        ]);
    }
}
