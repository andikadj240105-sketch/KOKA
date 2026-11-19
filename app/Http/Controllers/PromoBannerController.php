<?php

namespace App\Http\Controllers;

use App\Models\PromoBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoBannerController extends Controller
{
    public function index()
    {
        $banners = PromoBanner::orderBy('urutan', 'asc')->latest()->get();
        return view('admin.banner', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'nullable|string|max:255',
            'gambar'      => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // Maks 3MB
            'link_tujuan' => 'nullable|string|max:255',
            'urutan'      => 'nullable|integer',
        ]);

        $path = $request->file('gambar')->store('banners', 'public');

        PromoBanner::create([
            'judul'       => $request->judul,
            'gambar'      => $path,
            'link_tujuan' => $request->link_tujuan,
            'urutan'      => $request->urutan ?? 0,
            'is_active'   => 1,
        ]);

        return back()->with('success', 'Banner iklan berhasil ditambahkan!');
    }

    public function toggle($id)
    {
        $banner = PromoBanner::findOrFail($id);
        $banner->update(['is_active' => !$banner->is_active]);

        return back()->with('success', 'Status tayang banner berhasil diubah.');
    }

    public function destroy($id)
    {
        $banner = PromoBanner::findOrFail($id);
        if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
            Storage::disk('public')->delete($banner->gambar);
        }
        $banner->delete();

        return back()->with('success', 'Banner iklan berhasil dihapus.');
    }
}