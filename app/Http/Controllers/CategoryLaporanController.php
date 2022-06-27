<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category_laporan;

class CategoryLaporanController extends Controller
{
    public function category()
    {
        $data = Category_laporan::all();
        return view('category.index', compact('data'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        Category_laporan::create($request->all());
        return redirect()->route('category');
    }

    public function hapus(Request $request, $id)
    {
        $data =  Category_laporan::find($id);
        $data->delete($request->all());
        return redirect()->route('category');
    }
}
