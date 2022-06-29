<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category_laporan, Pendamping, Kecamatan, Laporan};

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        if($request->has('search')){
            $data = Laporan::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(2);
        }else{
            $data = Laporan::paginate(2);
        }
        return view('laporan.index', compact('data'));
    }

    public function create()
    {
        $category = Category_laporan::get();
        $pendamping = Pendamping::get();
        $kecamatan = Kecamatan::get();
        return view('laporan.create', compact('category', 'pendamping', 'kecamatan'));
    }

    public function store(Request $request)
    {
        $data = Laporan::create($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('tambahfoto/', $request->file('foto')->getclientoriginalname());
            $data->foto = $request->file('foto')->getclientoriginalname();
            $data->save();
        }
        return redirect()->route('laporan');
    }

    public function tampil($id)   
    {
        $data = Laporan::find($id);
        return view('laporan.tampil-data', compact('data'));
    }

    public function hapus(Request $request, $id)
    {
        $data = Laporan::find($id);
        $data->delete($request->all());
        return redirect()->route('laporan');
    }

    public function delete(Request $request, $id)
    {
        $data = Laporan::find($id);
        $data->delete($request->all());
        return redirect()->route('laporan');
    }

    public function edit($id)
    {
        $data = Laporan::find($id);
        $category = Category_laporan::get();
        $pendamping = Pendamping::get();
        $kecamatan = Kecamatan::get();
        return view('laporan.edit', compact('data', 'category', 'pendamping', 'kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $data = Laporan::find($id);
        $data->update($request->all());
        if($request->hasfile('foto')){
            $request->file('foto')->move('tambahfoto/', $request->file('foto')->getclientoriginalname());
            $data->foto = $request->file('foto')->getclientoriginalname();
            $data->save();
        }
        return redirect()->route('laporan');
    }
}
