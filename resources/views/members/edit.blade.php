@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <h1>Edit Anggota</h1>
    <p><a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a></p>

    <form action="{{ route('members.update', $member['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $member['nama']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
        @error('nama')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <label for="nim" style="display: block; margin-top: 12px;">NIM</label>
        <input type="text" name="nim" id="nim" value="{{ old('nim', $member['nim']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
        @error('nim')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <label for="email" style="display: block; margin-top: 12px;">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $member['email']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
        @error('email')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <label for="nomor_telepon" style="display: block; margin-top: 12px;">Nomor Telepon</label>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $member['nomor_telepon']) }}" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
        @error('nomor_telepon')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <label for="alamat" style="display: block; margin-top: 12px;">Alamat</label>
        <textarea name="alamat" id="alamat" rows="4" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">{{ old('alamat', $member['alamat']) }}</textarea>
        @error('alamat')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <label for="status" style="display: block; margin-top: 12px;">Status</label>
        <select name="status" id="status" style="width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box;">
            <option value="aktif" @selected(old('status', $member['status']) === 'aktif')>Aktif</option>
            <option value="nonaktif" @selected(old('status', $member['status']) === 'nonaktif')>Nonaktif</option>
        </select>
        @error('status')
            <div style="color: #b91c1c; font-size: 14px; margin-top: 4px;">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn" style="margin-top: 20px;">Perbarui</button>
    </form>
@endsection