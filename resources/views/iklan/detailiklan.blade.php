<!-- resources/views/iklan/detailiklan.blade.php -->
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
            <h1>Detail Iklan</h1>
            <div class="mb-3">
                <h2>{{ $iklan->title }}</h2>
                <p>{{ $iklan->deskripsi }}</p>
                <p><strong>Genre:</strong> {{ $iklan->genre->genre ?? 'N/A' }}</p>
                <p><strong>Section:</strong> {{ $iklan->section->section ?? 'N/A' }}</p>

                <!-- Displaying images -->
                <img src="{{ asset('storage/' . $iklan->image) }}" alt="{{ $iklan->title }}" style="width: 50%; height: auto;">
                @if($iklan->image2)
                    <img src="{{ asset('storage/' . $iklan->image2) }}" alt="{{ $iklan->title }}" style="width: 50%; height: auto;">
                @endif
                @if($iklan->image3)
                    <img src="{{ asset('storage/' . $iklan->image3) }}" alt="{{ $iklan->title }}" style="width: 50%; height: auto;">
                @endif
                @if($iklan->image4)
                    <img src="{{ asset('storage/' . $iklan->image4) }}" alt="{{ $iklan->title }}" style="width: 50%; height: auto;">
                @endif
                @if($iklan->image5)
                    <img src="{{ asset('storage/' . $iklan->image5) }}" alt="{{ $iklan->title }}" style="width: 50%; height: auto;">
                @endif

                <!-- New section for links -->
                <p><strong>Link Google Maps:</strong> 
                    <a href="{{ $iklan->linkgmaps }}" target="_blank">{{ $iklan->linkgmaps ?? 'Tidak tersedia' }}</a>
                </p>
                <p><strong>Link Embed:</strong> 
                    <a href="{{ $iklan->linkembed }}" target="_blank">{{ $iklan->linkembed ?? 'Tidak tersedia' }}</a>
                </p>
                <p><strong>Link Instagram:</strong> 
                    <a href="{{ $iklan->link_ig }}" target="_blank">{{ $iklan->link_ig ?? 'Tidak tersedia' }}</a>
                </p>

                <p><strong>Dibuat pada:</strong> {{ $iklan->created_at }}</p>
                <p><strong>Diperbarui pada:</strong> {{ $iklan->updated_at }}</p>
            </div>

            <!-- Tombol Edit dan Hapus -->
            <a href="{{ route('iklan.edit', $iklan->id_iklan) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('iklan.destroy', $iklan->id_iklan) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            <a href="{{ route('iklan.index') }}" class="btn btn-secondary">Kembali ke Daftar Iklan</a>
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
