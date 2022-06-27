<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendamping;

class PendampingController extends Controller
{
    public function pendamping()
    {
        return view('pendamping.index');
    }

    public function create()
    {
        return view('pendamping.create');
    }

    public function store(Request $request)
    {
        Pendamping::create($request->all());
        return redirect()->route('pendamping');
    }
}
