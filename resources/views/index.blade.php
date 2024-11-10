@extends('layouts.app')

@section('content')
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

    <!-- Main Content Area -->
    <div class="home-section">
        <h1>Daftar Iklan</h1>
        <a href="{{ route('iklan.create') }}" class="btn btn-primary">Tambah Iklan</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Genre</th>
                    <th>Section</th>
                    <th>Tanggal Dibuat</th>
                    <th>Tanggal Diupdate</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($iklans as $iklan)
                    <tr>
                        <td>{{ $iklan->id_iklan }}</td>
                        <td>{{ $iklan->title }}</td>
                        <td>{{ $iklan->deskripsi }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $iklan->image) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $iklan->genre->genre ?? 'N/A' }}</td>
                        <td>{{ $iklan->section->section ?? 'N/A' }}</td>
                        <td>{{ $iklan->created_at }}</td>
                        <td>{{ $iklan->updated_at }}</td>
                        <td>
                            <a href="{{ route('iklan.show', $iklan->id_iklan) }}" class="btn btn-info">Deskripsi</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
