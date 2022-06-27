<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
class KecamatanController extends Controller
{
    public function kecamatan()
    {
        return view('kecamatan.index');
    }

    public function create()
    {
        return view('kecamatan.create');
    }

    public function store(Request $request)
    {
        Kecamatan::create($request->all());
        return redirect()->route('kecamatan');
    }
}
