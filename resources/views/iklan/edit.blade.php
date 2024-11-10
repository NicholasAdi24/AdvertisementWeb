<!-- resources/views/iklan/edit.blade.php -->
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
    <h1>Edit Iklan</h1>
    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <form action="{{ route('iklan.update', $iklan->id_iklan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $iklan->title }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $iklan->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Ganti Genre</label>
            <select class="form-select" id="genre_id" name="genre_id" required>
                <option value="" disabled>Pilih Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id_genre }}" {{ $iklan->genre_id == $genre->id_genre ? 'selected' : '' }}>
                        {{ $genre->genre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="section_id" class="form-label">Ganti Section</label>
            <select name="section_id" id="section_id" class="form-select" required>
                <option value="" disabled>Pilih Section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id_section }}" {{ $iklan->section_id == $section->id_section ? 'selected' : '' }}>
                        {{ $section->section }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Link Google Maps -->
        <div class="mb-3">
            <label for="linkgmaps" class="form-label">Link Google Maps</label>
            <input type="url" class="form-control" id="linkgmaps" name="linkgmaps" value="{{ $iklan->linkgmaps }}" placeholder="Masukkan URL Google Maps">
        </div>

        <!-- Link Embed -->
        <div class="mb-3">
            <label for="linkembed" class="form-label">Link Embed</label>
            <input type="url" class="form-control" id="linkembed" name="linkembed" value="{{ $iklan->linkembed }}" placeholder="Masukkan URL Embed">
        </div>

        <!-- Link Instagram -->
        <div class="mb-3">
            <label for="link_ig" class="form-label">Link Instagram</label>
            <input type="url" class="form-control" id="link_ig" name="link_ig" value="{{ $iklan->link_ig }}" placeholder="Masukkan URL Instagram">
        </div>

        <!-- Existing Image Fields -->
<!-- Gambar 1 -->
<div class="mb-3">
    <label for="image" class="form-label">Gambar 1 (kosongkan jika tidak ingin mengganti)</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*">
    @if($iklan->image)
        <img src="{{ asset('storage/' . $iklan->image) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;" class="mt-2">
        <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => 'image']) }}" class="btn btn-danger btn-sm mt-2">Hapus Gambar 1</a>
    @endif
</div>

<!-- Gambar 2 -->
<div class="mb-3">
    <label for="image2" class="form-label">Gambar 2 (kosongkan jika tidak ingin mengganti)</label>
    <input type="file" class="form-control" id="image2" name="image2" accept="image/*">
    @if($iklan->image2)
        <img src="{{ asset('storage/' . $iklan->image2) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;" class="mt-2">
        <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => 'image2']) }}" class="btn btn-danger btn-sm mt-2">Hapus Gambar 2</a>

    @endif
</div>

<!-- Gambar 3 -->
<div class="mb-3">
    <label for="image3" class="form-label">Gambar 3 (kosongkan jika tidak ingin mengganti)</label>
    <input type="file" class="form-control" id="image3" name="image3" accept="image/*">
    @if($iklan->image3)
        <img src="{{ asset('storage/' . $iklan->image3) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;" class="mt-2">
        <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => 'image3']) }}" class="btn btn-danger btn-sm mt-2">Hapus Gambar 3</a>
    @endif
</div>

<!-- Gambar 4 -->
<div class="mb-3">
    <label for="image4" class="form-label">Gambar 4 (kosongkan jika tidak ingin mengganti)</label>
    <input type="file" class="form-control" id="image4" name="image4" accept="image/*">
    @if($iklan->image4)
        <img src="{{ asset('storage/' . $iklan->image4) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;" class="mt-2">
        <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => 'image4']) }}" class="btn btn-danger btn-sm mt-2">Hapus Gambar 4</a>
    @endif
</div>

<!-- Gambar 5 -->
<div class="mb-3">
    <label for="image5" class="form-label">Gambar 5 (kosongkan jika tidak ingin mengganti)</label>
    <input type="file" class="form-control" id="image5" name="image5" accept="image/*">
    @if($iklan->image5)
        <img src="{{ asset('storage/' . $iklan->image5) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;" class="mt-2">
        <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => 'image5']) }}" class="btn btn-danger btn-sm mt-2">Hapus Gambar 5</a>
    @endif
</div>

<!-- New Gallery Fields -->
@for ($i = 1; $i <= 5; $i++)
    <div class="mb-3">
        <label for="galeri{{ $i }}" class="form-label">Galeri {{ $i }} (kosongkan jika tidak ingin mengganti)</label>
        <input type="file" class="form-control" id="galeri{{ $i }}" name="galeri{{ $i }}" accept="image/*">
        
        @php
            $galleryImage = 'galeri' . $i;
        @endphp
        
        @if($iklan->$galleryImage)
            <img src="{{ asset('storage/' . $iklan->$galleryImage) }}" alt="Galeri {{ $i }}" style="width: 100px; height: auto;" class="mt-2">
            <a href="{{ route('iklan.deleteImage', ['id' => $iklan->id_iklan, 'image' => $galleryImage]) }}" class="btn btn-danger btn-sm mt-2">Hapus Galeri {{ $i }}</a>
        @endif
    </div>
@endfor

        <button type="submit" class="btn btn-primary">Update</button>
        
        <a href="{{ route('iklan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
