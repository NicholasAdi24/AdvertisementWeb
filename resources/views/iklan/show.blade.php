<!-- resources/views/iklan/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Iklan</h1>

    <div class="mb-3">
        <strong>Judul:</strong> {{ $iklan->title }}
    </div>
    <div class="mb-3">
        <strong>Deskripsi:</strong> {{ $iklan->deskripsi }}
    </div>
    <div class="mb-3">
        <strong>Gambar:</strong><br>
        <img src="{{ asset('storage/' . $iklan->image) }}" alt="{{ $iklan->title }}" style="width: 100px; height: auto;">
    </div>
    <div class="mb-3">
        <strong>Tanggal Dibuat:</strong> {{ $iklan->created_at }}
    </div>
    <div class="mb-3">
        <strong>Tanggal Diupdate:</strong> {{ $iklan->updated_at }}
    </div>
    <a href="{{ route('iklan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
