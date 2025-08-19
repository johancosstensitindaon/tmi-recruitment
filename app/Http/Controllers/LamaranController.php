<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index(Request $request): View
    {
        $title = 'Lamaran';
        $user = $request->user();
        $kandidat = Kandidat::where('user_id', $user->id)->first();
        return view('user.lamaran', compact('title', 'user', 'kandidat'));
    }
}
