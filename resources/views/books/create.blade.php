{{-- File: resources/views/books/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <h1>Tambah Buku</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 12px;">
            <label for="judul" style="display: block; font-weight: bold; margin-bottom: 4px;">Judul</label>
            <input type="text" name="judul" id="judul" value="{{ old('judul') }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('judul')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="penulis" style="display: block; font-weight: bold; margin-bottom: 4px;">Penulis</label>
            <input type="text" name="penulis" id="penulis" value="{{ old('penulis') }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('penulis')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="penerbit" style="display: block; font-weight: bold; margin-bottom: 4px;">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('penerbit')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="tahun_terbit" style="display: block; font-weight: bold; margin-bottom: 4px;">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit') }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('tahun_terbit')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="isbn" style="display: block; font-weight: bold; margin-bottom: 4px;">ISBN (opsional)</label>
            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('isbn')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 12px;">
            <label for="stok" style="display: block; font-weight: bold; margin-bottom: 4px;">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ old('stok', 1) }}" style="width: 100%; max-width: 500px; padding: 6px;">
            @error('stok')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="category_id" style="display: block; font-weight: bold; margin-bottom: 4px;">Kategori</label>
            <select name="category_id" id="category_id" style="width: 100%; max-width: 500px; padding: 6px;">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" @selected(old('category_id') == $category['id'])>
                        {{ $category['nama_kategori'] }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection