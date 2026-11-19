<?php

namespace App\Http\Controllers;

use App\Models\Kos; // WAJIB DITAMBAHKAN
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
    {
        // Ambil 4 kos terbaru tanpa filter status
        $kosans = Kos::latest()->take(4)->get();
        
        return view('beranda', compact('kosans'));
    }
}