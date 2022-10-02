<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home1');
    }

    public function show($id)
    {
        $aspects = Pengaduan::findOrFail($id);
        return view('home3', compact('aspects'));
    }
}
