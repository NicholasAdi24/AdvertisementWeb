<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use App\Models\Genre;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    // Menampilkan daftar iklan dengan sorting section
    public function index(Request $request)
    {
        $section_id = $request->input('section_id');
        $iklans = $section_id ? Iklan::where('section_id', $section_id)->get() : Iklan::all();
        
        $sections = Section::all();
        return view('index', compact('iklans', 'sections'));
    }

    // Menampilkan form untuk membuat iklan baru
    public function create()
    {
        $genres = Genre::all();
        $sections = Section::all();
        return view('iklan.create', compact('genres', 'sections'));
    }

    // Menyimpan iklan baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'genre_id' => 'required|integer|exists:genre,id_genre',
            'section_id' => 'required|integer|exists:section,id_section',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:51200',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image4' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image5' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri1' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri2' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri3' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri4' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri5' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'linkgmaps' => 'nullable|url',
            'linkembed' => 'nullable|url',
            'link_ig' => 'nullable|url'
        ]);

        $data = $request->only([
            'title', 'deskripsi', 'genre_id', 'section_id', 'linkgmaps', 'linkembed', 'link_ig'
        ]);

        // Upload image fields
        foreach (['image', 'image2', 'image3', 'image4', 'image5', 'galeri1', 'galeri2', 'galeri3', 'galeri4', 'galeri5'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('iklan', 'public');
            }
        }

        Iklan::create($data + ['created_at' => now(), 'updated_at' => now()]);

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil ditambahkan.');
    }

    // Menampilkan detail iklan
    public function show(Iklan $iklan)
    {
        return view('iklan.show', compact('iklan'));
    }

    public function showdetail(Iklan $iklan)
    {
        return view('iklan.detailiklan', compact('iklan'));
    }

    // Menampilkan form untuk mengedit iklan
    public function edit(Iklan $iklan)
    {
        $genres = Genre::all();
        $sections = Section::all();
        return view('iklan.edit', compact('iklan', 'genres', 'sections'));
    }

    // Memperbarui iklan
    public function update(Request $request, Iklan $iklan)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'genre_id' => 'required|integer|exists:genre,id_genre',
            'section_id' => 'required|integer|exists:section,id_section',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image2' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image3' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image4' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'image5' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri1' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri2' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri3' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri4' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'galeri5' => 'image|mimes:jpeg,png,jpg,gif|max:51200',
            'linkgmaps' => 'nullable|url',
            'linkembed' => 'nullable|url',
            'link_ig' => 'nullable|url'
        ]);

        $data = $request->only([
            'title', 'deskripsi', 'genre_id', 'section_id', 'linkgmaps', 'linkembed', 'link_ig'
        ]);

        // Update and delete old images if replaced
        foreach (['image', 'image2', 'image3', 'image4', 'image5', 'galeri1', 'galeri2', 'galeri3', 'galeri4', 'galeri5'] as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if it exists
                if (!empty($iklan->$field)) {
                    Storage::disk('public')->delete($iklan->$field);
                }
                // Store the new image
                $data[$field] = $request->file($field)->store('iklan', 'public');
            }
        }

        $iklan->update($data + ['updated_at' => now()]);

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil diperbarui.');
    }

    public function deleteImage($id, $image)
    {
        $iklan = Iklan::findOrFail($id);
    
        // Check if the image field exists and delete the image file if it does
        if ($iklan->$image) {
            // Delete the file from storage
            Storage::disk('public')->delete($iklan->$image);
    
            // Set the field to null in the database
            $iklan->$image = null;
            $iklan->save();
        }
    
        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }

    // Menghapus iklan
    public function destroy(Iklan $iklan)
    {
        // Delete all images associated with this ad
        foreach (['image', 'image2', 'image3', 'image4', 'image5', 'galeri1', 'galeri2', 'galeri3', 'galeri4', 'galeri5'] as $field) {
            if ($iklan->$field) {
                Storage::disk('public')->delete($iklan->$field);
            }
        }
        $iklan->delete();

        return redirect()->route('iklan.index')->with('success', 'Iklan berhasil dihapus.');
    }
}
