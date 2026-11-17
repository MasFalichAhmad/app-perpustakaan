@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <h1>Edit Peminjaman</h1>
    <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

    <label style="display:block; margin-top:12px; font-weight:bold;">Anggota</label>
    <div style="background:#f3f4f6; padding:8px; border-radius:4px; margin-top:4px;">
        {{ $loan['member']['nama'] }} ({{ $loan['member']['nim'] }})
    </div>

    <label style="display:block; margin-top:12px; font-weight:bold;">Buku</label>
    <div style="background:#f3f4f6; padding:8px; border-radius:4px; margin-top:4px;">
        @foreach ($loan['loanItems'] as $item)
            {{ $item['book']['judul'] }}@if (!$loop->last), @endif
        @endforeach
    </div>

    <form action="{{ route('loans.update', $loan['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="tanggal_pinjam" value="{{ $loan['tanggal_pinjam'] }}">

        <label for="tanggal_kembali" style="display:block; margin-top:12px; font-weight:bold;">Tanggal Kembali</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali', $loan['tanggal_kembali']) }}" style="width:100%; padding:6px; margin-top:4px;">
        @error('tanggal_kembali') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <label for="status" style="display:block; margin-top:12px; font-weight:bold;">Status</label>
        <select name="status" id="status" style="width:100%; padding:6px; margin-top:4px;">
            <option value="dipinjam" @selected(old('status', $loan['status']) == 'dipinjam')>Dipinjam</option>
            <option value="dikembalikan" @selected(old('status', $loan['status']) == 'dikembalikan')>Dikembalikan</option>
            <option value="terlambat" @selected(old('status', $loan['status']) == 'terlambat')>Terlambat</option>
        </select>
        @error('status') <div style="color:#b91c1c; font-size:14px;">{{ $message }}</div> @enderror

        <button type="submit" class="btn" style="margin-top:20px;">Perbarui</button>
    </form>
@endsection