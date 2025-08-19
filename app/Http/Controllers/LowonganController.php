<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index(Request $request): View
    {
        $title = 'Lowongan';
        $user = $request->user();
        $kandidat = Kandidat::where('user_id', $user->id)->first();
        return view('user.lowongan', compact('title', 'user', 'kandidat'));
    }
}
