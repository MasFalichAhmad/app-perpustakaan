@extends('layouts.app')

@section('title', 'Laporan Peminjaman')

@section('content')
    <h1>Laporan Peminjaman</h1>
    <p>Data diambil langsung dari <code>GET /api/loans</code>, bukan query database langsung.</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Petugas</th>
                <th>Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loans as $loan)
                @php
                    // Menghitung selisih hari dari hari ini ke tanggal kembali
                    $tglKembali = \Carbon\Carbon::parse($loan['tanggal_kembali']);
                    $selisihHari = now()->startOfDay()->diffInDays($tglKembali, false);
                @endphp
                <tr>
                    <td>{{ $loan['id'] }}</td>
                    <td>{{ $loan['member']['nama'] }}</td>
                    <td>{{ $loan['petugas']['name'] }}</td>
                    <td>
                        @foreach ($loan['books'] as $book)
                            {{ $book['judul'] }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $loan['tanggal_pinjam'] }}</td>
                    
                    {{-- Kolom Tgl Kembali + Peringatan Deadline --}}
                    <td>
                        {{ $loan['tanggal_kembali'] }}
                        @if ($loan['status'] === 'dipinjam')
                            @if ($selisihHari < 0)
                                <br><span style="color: #dc2626; font-size: 12px; font-weight: bold;">Terlambat (Lewat {{ abs($selisihHari) }} hari)</span>
                            @elseif ($selisihHari <= 2)
                                <br><span style="color: #d97706; font-size: 12px; font-weight: bold;">Deadline {{ $selisihHari === 0 ? 'Hari Ini!' : 'dalam ' . $selisihHari . ' hari' }}</span>
                            @endif
                        @endif
                    </td>

                    {{-- Kolom Status dengan Badge Berwarna --}}
                    <td>
                        @if ($loan['status'] === 'dipinjam')
                            <span style="background: #fef3c7; color: #92400e; padding: 3px 8px; border-radius: 4px; font-size: 12px;">Dipinjam</span>
                        @elseif ($loan['status'] === 'terlambat')
                            <span style="background: #fee2e2; color: #991b1b; padding: 3px 8px; border-radius: 4px; font-size: 12px;">Terlambat</span>
                        @else
                            <span style="background: #d1fae5; color: #065f46; padding: 3px 8px; border-radius: 4px; font-size: 12px;">Dikembalikan</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Belum ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($meta && $meta['last_page'] > 1)
        <p>
            @if ($meta['current_page'] > 1)
                <a href="{{ route('loans.report', ['page' => $meta['current_page'] - 1]) }}">&laquo; Sebelumnya</a>
            @endif
            Halaman {{ $meta['current_page'] }} dari {{ $meta['last_page'] }}
            @if ($meta['current_page'] < $meta['last_page'])
                <a href="{{ route('loans.report', ['page' => $meta['current_page'] + 1]) }}">Selanjutnya &raquo;</a>
            @endif
        </p>
    @endif
@endsection