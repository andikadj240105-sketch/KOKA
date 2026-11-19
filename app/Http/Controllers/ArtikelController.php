<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    // ==========================================
    // BAGIAN UNTUK PENGGUNA (USER PUBLIK)
    // ==========================================

    public function indexUser()
    {
        // Hanya tampilkan artikel yang statusnya 'Published'
        $artikels = Artikel::where('status', 'Published')->latest()->get();
        return view('artikel', compact('artikels'));
    }

    public function showUser($slug)
    {
        // Cari artikel berdasarkan slug (URL), dan pastikan statusnya Published
        $artikel = Artikel::where('slug', $slug)
                          ->where('status', 'Published')
                          ->firstOrFail();
                          
        return view('detail-artikel', compact('artikel'));
    }

    // ==========================================
    // BAGIAN UNTUK ADMIN
    // ==========================================

    public function indexAdmin()
    {
        $artikels = Artikel::latest()->get()->map(function ($item) {
            // Siapkan URL gambar agar mudah dibaca oleh Alpine.js di tampilan
            $item->gambar_url = $item->gambar ? asset('storage/' . $item->gambar) : null;
            return $item;
        });

        return view('admin.artikel', compact('artikels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'             => 'required|string|max:255',
            'kategori'          => 'required|string|max:100',
            'status'            => 'required|in:Published,Draft',
            'deskripsi_singkat' => 'required|string',
            'konten'            => 'required|array', // Validasi konten sebagai array blok
            'konten.*.type'     => 'required|in:subjudul,paragraf',
            'konten.*.text'     => 'required|string',
            'gambar'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except(['_token', 'gambar']);
        
        // Buat slug otomatis dari judul
        $slug = Str::slug($request->judul);
        
        if (Artikel::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }
        $data['slug'] = $slug;
        $data['penulis'] = 'Admin'; 

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create($data);

        return redirect()->back()->with('success', 'Artikel baru berhasil diterbitkan!');
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'             => 'required|string|max:255',
            'kategori'          => 'required|string|max:100',
            'status'            => 'required|in:Published,Draft',
            'deskripsi_singkat' => 'required|string',
            'konten'            => 'required|array', // Validasi konten sebagai array blok
            'konten.*.type'     => 'required|in:subjudul,paragraf',
            'konten.*.text'     => 'required|string',
            'gambar'            => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except(['_token', '_method', 'gambar']);
        
        // Update slug jika judul diubah
        $newSlug = Str::slug($request->judul);
        if ($artikel->slug !== $newSlug) {
            if (Artikel::where('slug', $newSlug)->exists()) {
                $newSlug = $newSlug . '-' . time();
            }
            $data['slug'] = $newSlug;
        }

        // Proses ganti gambar
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikel', 'public');
        }

        $artikel->update($data);

        return redirect()->back()->with('success', 'Data artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }
        
        $judul = $artikel->judul;
        $artikel->delete();

        return redirect()->back()->with('success', 'Artikel "' . $judul . '" berhasil dihapus.');
    }
}