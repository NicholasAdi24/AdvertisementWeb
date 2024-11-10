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
    <h1>Tambah Banner Baru</h1>

    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subtitle" class="form-label">Sub Judul</label>
            <input type="text" name="subtitle" class="form-control">
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control">
        </div>

        <div class="mb-3">
            <label for="banner_image" class="form-label">Gambar Banner</label>
            <input type="file" name="banner_image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </form>
    </main>
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


