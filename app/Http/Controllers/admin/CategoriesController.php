<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Categories::all();
        return view('admin.categories.index', $data);
    }

    //function menampilkan view tambah data
    public function tambah()
    {
        return view('admin.categories.tambah');
    }

    public function store(Request $request)
    {
        //Simpan datab ke database    
        Categories::updateOrCreate([
            'name' => $request->name
        ], []);
         return redirect()->route('admin.categories')->with('status', 'Berhasil Menambah Kategori');
    }

    public function update(Categories $id, Request $request)
    {
        $id->update([
            'name' => $request->name
        ]);
        return redirect()->route('admin.categories')->with('status', 'Berhasil Mengubah Kategori');
    }

    public function edit(Categories $id)
    {
        return view('admin.categories.edit', [
            'categorie' => $id
        ]);
    }

    public function delete($id)
    {

        Categories::destroy($id);
        return redirect()->route('admin.categories')->with('status', 'Berhasil Mengahapus Kategori');
    }
}
