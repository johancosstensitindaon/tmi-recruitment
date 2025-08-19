<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Karir PT.TMI';
        $lowongan = Lowongan::with(['kategori', 'department'])->get();
        return view('landing.main', compact('title', 'lowongan'));
    }
}
