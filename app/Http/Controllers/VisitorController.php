<?php

// app/Http/Controllers/VisitorController.php
namespace App\Http\Controllers;
use App\Models\Iklan;
use App\Models\Genre;
use App\Models\Banner;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
    // Mengambil iklan dengan section_id == 1 untuk Promo Minggu Ini
    $promoMingguIni = Iklan::with('genre')->where('section_id', 1)->get();
    
    // Mengambil iklan dengan section_id == 2 untuk Best Sellers & Recommended
    $bestSellers = Iklan::with('genre')->where('section_id', 2)->get();

        // Mengambil iklan dengan section_id == 3
        $termurah = Iklan::with('genre')->where('section_id', 3)->get();

                // Mengambil iklan dengan section_id == 4 
                $lifestyle = Iklan::with('genre')->where('section_id', 4)->get();

        $banners = Banner::where('is_hidden', false)->get(); // Fetch all visible banners
        return view('visitor.indexvisitor', compact('promoMingguIni', 'bestSellers', 'termurah','lifestyle','banners')); // Send all banners to the view
    }

    public function show($id)
    {
        // Mengambil detail iklan berdasarkan ID
        $iklan = Iklan::with('genre')->findOrFail($id);

        // Menampilkan halaman detail
        return view('visitor.detailitem', compact('iklan'));
    }

    
}
