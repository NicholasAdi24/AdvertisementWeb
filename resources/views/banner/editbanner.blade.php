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
                <a href="{{ route('iklan.index') }}" class="nav_link">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="links_name">Daftar Iklan</span>
                </a>
                <span class="tooltip">Daftar Iklan</span>
            </li>
            <li>
                <a href="{{ route('banner.index') }}" class="nav_link active">
                    <i class='bx bx-bookmark nav_icon'></i>
                    <span class="links_name">Kelola Banner</span>
                </a>
                <span class="tooltip">Kelola Banner</span>
            </li>
        </ul>

    </nav>

    <main class="home-section">
    <h1>Edit Banner</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $banner->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sub Judul</label>
            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $banner->subtitle) }}">
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link', $banner->link) }}">
        </div>

        <div class="mb-3">
            <label for="banner_image" class="form-label">Gambar Banner</label>
            <input type="file" name="banner_image" class="form-control">
            <small>Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>

        <!-- Menampilkan gambar yang sudah ada -->
        @if($banner->banner_image)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Banner Image" class="img-fluid" style="max-width: 200px;">
            </div>
        @endif

        <div class="mb-3">
            <input type="checkbox" name="is_hidden" {{ $banner->is_hidden ? 'checked' : '' }}> Sembunyikan Banner
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
    </form>
    </main>
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
