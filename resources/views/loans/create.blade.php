@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h1>Tambah Peminjaman</h1>
    <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <label for="member_id" style="display:block; margin-top:12px; font-weight:bold;">Anggota</label>
        <select name="member_id" id="member_id" style="width:100%; padding:6px; margin-top:4px;">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($members as $member)
                <option value="{{ $member['id'] }}" @selected(old('member_id') == $member['id'])>
                    {{ $member['nama'] }} ({{ $member['nim'] }})
                </option>
            @endforeach
        </select>
        @error('member_id') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <label for="user_id" style="display:block; margin-top:12px; font-weight:bold;">Petugas</label>
        <select name="user_id" id="user_id" style="width:100%; padding:6px; margin-top:4px;">
            <option value="">-- Pilih Petugas --</option>
            @foreach ($users as $user)
                <option value="{{ $user['id'] }}" @selected(old('user_id') == $user['id'])>
                    {{ $user['name'] }}
                </option>
            @endforeach
        </select>
        @error('user_id') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <label for="tanggal_pinjam" style="display:block; margin-top:12px; font-weight:bold;">Tanggal Pinjam</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" style="width:100%; padding:6px; margin-top:4px;">
        @error('tanggal_pinjam') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <label for="tanggal_kembali" style="display:block; margin-top:12px; font-weight:bold;">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}" style="width:100%; padding:6px; margin-top:4px;">
        @error('tanggal_kembali') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <label style="display:block; margin-top:12px; font-weight:bold;">Buku yang Dipinjam</label>
        <div style="border:1px solid #ccc; border-radius:4px; padding:10px; margin-top:4px; max-height:200px; overflow-y:auto;">
            @forelse ($books as $book)
                <label style="display:block; margin-bottom:4px;">
                    <input type="checkbox" name="book_ids[]" value="{{ $book['id'] }}"
                        @checked(in_array($book['id'], old('book_ids', [])))>
                    {{ $book['judul'] }} (stok: {{ $book['stok'] }})
                </label>
            @empty
                <p>Belum ada data buku.</p>
            @endforelse
        </div>
        @error('book_ids') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <button type="submit" class="btn" style="margin-top:20px;">Simpan</button>
    </form>
@endsection