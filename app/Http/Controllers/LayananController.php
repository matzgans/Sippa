<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Kecamatan, Layanan};

class LayananController extends Controller
{
    public function layanan()
    {
        $data = Layanan::paginate(2);
        return view('layanan.index', compact('data'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::get();
        return view('layanan.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        Layanan::create($request->all());
        return redirect()->route('layanan');
    }

    public function delete(Request $request, $id)
    {
        $data = Layanan::find($id);
        $data->delete($request->all());
        return redirect()->route('layanan');
    }
}
