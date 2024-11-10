<!-- resources/views/iklan/create.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="body-main">
        <!-- Sidebar Navigation -->
        <nav class="sidebar open" id="nav-bar">
            <div class="logo-details">
                <a href="{{ url('/') }}" class="logo">
                    <span class="logo_name">BULETIN KISS</span>
                </a>
                <i class='bx bx-menu' id="btn"></i> <!-- Tombol toggle sidebar -->
            </div>
            <ul class="nav-list">
                <li>
                    <a href="{{ route('iklan.index') }}" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="links_name">Daftar Iklan</span>
                    </a>
                    <span class="tooltip">Daftar Iklan</span>
                </li>
                <li>
                    <a href="{{ route('banner.index') }}" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i>
                        <span class="links_name">Kelola Banner</span>
                    </a>
                    <span class="tooltip">Kelola Banner</span>
                </li>
            </ul>
        </nav>

        <div class="home-section">
            <h1>Tambah Iklan</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('iklan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre</label>
                    <select class="form-select" id="genre_id" name="genre_id" required>
                        <option value="" disabled selected>Pilih Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id_genre }}">{{ $genre->genre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="section_id" class="form-label">Pilih Section</label>
                    <select name="section_id" id="section_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id_section }}">{{ $section->section }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="linkgmaps" class="form-label">Link Google Maps</label>
                    <input type="url" class="form-control" id="linkgmaps" name="linkgmaps" placeholder="Masukkan URL Google Maps">
                </div>
                <div class="mb-3">
                    <label for="linkembed" class="form-label">Link Embed</label>
                    <input type="url" class="form-control" id="linkembed" name="linkembed" placeholder="Masukkan URL Embed">
                </div>
                <div class="mb-3">
                    <label for="link_ig" class="form-label">Link Instagram</label>
                    <input type="url" class="form-control" id="link_ig" name="link_ig" placeholder="Masukkan URL Instagram">
                </div>

                <!-- Image uploads -->
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar 1</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="image2" class="form-label">Gambar 2</label>
                    <input type="file" class="form-control" id="image2" name="image2" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="image3" class="form-label">Gambar 3</label>
                    <input type="file" class="form-control" id="image3" name="image3" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="image4" class="form-label">Gambar 4</label>
                    <input type="file" class="form-control" id="image4" name="image4" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="image5" class="form-label">Gambar 5</label>
                    <input type="file" class="form-control" id="image5" name="image5" accept="image/*">
                </div>

                <!-- Gallery uploads -->
                <div class="mb-3">
                    <label for="galeri1" class="form-label">Galeri 1</label>
                    <input type="file" class="form-control" id="galeri1" name="galeri1" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="galeri2" class="form-label">Galeri 2</label>
                    <input type="file" class="form-control" id="galeri2" name="galeri2" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="galeri3" class="form-label">Galeri 3</label>
                    <input type="file" class="form-control" id="galeri3" name="galeri3" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="galeri4" class="form-label">Galeri 4</label>
                    <input type="file" class="form-control" id="galeri4" name="galeri4" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="galeri5" class="form-label">Galeri 5</label>
                    <input type="file" class="form-control" id="galeri5" name="galeri5" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
// Toggle sidebar
let sidebar = document.querySelector(".sidebar");
let btn = document.querySelector("#btn");
let homeSection = document.querySelector(".home-section");

btn.addEventListener("click", function() {
    sidebar.classList.toggle("open");
    homeSection.classList.toggle("open");
});
</script>
@endsection
