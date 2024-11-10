<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    // Menampilkan semua banner
    public function index()
{
    // // Mengambil semua banner yang tidak di-hide (is_hidden = false)
    // $banners = Banner::where('is_hidden', false)->get();

    $banners = Banner::all();
    return view('banner.banner', compact('banners')); // Mengirim data banner ke view banner/banner.blade.php
}


    // Menampilkan form untuk menambah banner baru
    public function create()
    {
        return view('banner.createbanner');
    }

    // Menyimpan banner baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:51200', // 50 MB = 51200 KB
        ]);

        // Menyimpan gambar ke storage
        $path = $request->file('banner_image')->store('banners', 'public');

        // Simpan data ke database
        Banner::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
            'banner_image' => $path,
            'is_hidden' => false, // Secara default tidak di-hide
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner berhasil ditambahkan!');

    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'link' => 'nullable|string|max:255',
        'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:51200',
    ]);

    // Temukan banner berdasarkan ID
    $banner = Banner::findOrFail($id);

    // Update data banner
    $banner->title = $request->title;
    $banner->subtitle = $request->subtitle;
    $banner->link = $request->link;

    // Jika ada gambar baru, simpan gambar dan hapus yang lama
    if ($request->hasFile('banner_image')) {
        // Hapus gambar lama dari storage
        Storage::delete('public/' . $banner->banner_image);

        // Simpan gambar baru
        $path = $request->file('banner_image')->store('banners', 'public');
        $banner->banner_image = $path;
    }

    // Update status sembunyikan
    $banner->is_hidden = $request->has('is_hidden');

    // Simpan perubahan ke database
    $banner->save();

    return redirect()->route('banner.index')->with('success', 'Banner berhasil diperbarui!');
}


    // Menghapus banner dari database
    public function destroy($id)
    {
        // Mencari banner berdasarkan id
        $banner = Banner::findOrFail($id);

        // Hapus gambar dari storage
        Storage::delete('public/' . $banner->banner_image);

        // Hapus banner dari database
        $banner->delete();

        return redirect()->route('banners.index')->with('success', 'Banner berhasil dihapus!');
    }

    public function edit($id)
{
    // Temukan banner berdasarkan ID
    $banner = Banner::findOrFail($id);

    // Tampilkan view untuk mengedit banner dan kirim data banner ke view
    return view('banner.editbanner', compact('banner'));
}


    // Hide atau unhide banner
    public function hide($id)
    {
        // Mencari banner berdasarkan id
        $banner = Banner::findOrFail($id);

        // Toggle status is_hidden (true/false)
        $banner->is_hidden = !$banner->is_hidden;
        $banner->save();

        $message = $banner->is_hidden ? 'Banner berhasil disembunyikan!' : 'Banner berhasil ditampilkan!';
        return redirect()->route('banner.index')->with('success', $message);

    }
}
