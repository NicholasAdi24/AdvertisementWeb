@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="body-main">
        <!-- Sidebar -->
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

        <!-- Main Content -->
        <main class="home-section">
            <h1>Kelola Banner</h1>
            <a href="{{ route('banner.create') }}" class="btn btn-primary">Tambah Banner</a>

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
                        <th>Sub Judul</th>
                        <th>Gambar</th>
                        <th>Link</th>
                        <th>Tampilkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->id }}</td>
                            <td>{{ $banner->title }}</td>
                            <td>{{ $banner->subtitle }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="{{ $banner->title }}" style="width: 100px; height: auto;">
                            </td>
                            <td><a href="{{ $banner->link }}" target="_blank">Link</a></td>
                            <td>{{ !$banner->is_hidden ? 'Ya' : 'Tidak' }}</td> <!-- Periksa status -->
                            <td>
                                <!-- Edit and delete actions -->
                                <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
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
