@extends('layouts.app')

@section('title', 'Dashboard GudangKantin')

@section('content')
<style>
    .intro-box {
        background: linear-gradient(135deg, #2ecc71, #1abc9c);
        color: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
        animation: fadeSlideUp 0.6s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .intro-box h1 {
        font-size: 2.2em;
        margin-bottom: 10px;
    }

    .intro-box p {
        font-size: 1.2em;
        font-weight: 500;
        opacity: 0.95;
    }

    .card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.6s ease-out forwards;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05) translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        filter: brightness(1.15);
    }

    @keyframes fadeSlideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-delay-1 { animation-delay: 0.2s; }
    .fade-delay-2 { animation-delay: 0.4s; }
    .fade-delay-3 { animation-delay: 0.6s; }
    .fade-delay-4 { animation-delay: 0.8s; }
    .fade-delay-5 { animation-delay: 1s; }
</style>

<div class="intro-box">
    <h1>🚀 Selamat datang, {{ auth()->user()->name }}!</h1>
    <p>
        Siap memantau gudang dan kantin hari ini? Kelola semua data barang, supplier, penjualan, dan stok dengan lancar!
        <br><strong>Tidak ada yang boleh lepas dari radar GudangKantin! 💼📦</strong>
    </p>
</div>

<div style="display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
    <a href="{{ route('pengeluaran.index') }}" class="card fade-delay-1" style="background: #3498db; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px; text-decoration: none;">
        <h2>Pengeluaran</h2>
        <p>Pantau barang yang keluar untuk keperluan penjualan harian.</p>
    </a>
    <a href="{{ route('pemasukan.index') }}" class="card fade-delay-2" style="background: #e67e22; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px; text-decoration: none;">
        <h2>Pemasukan</h2>
        <p>Catat barang yang baru masuk dari supplier ke gudang.</p>
    </a>
    <a href="{{ route('laporan.index') }}" class="card fade-delay-3" style="background: #9b59b6; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px; text-decoration: none;">
        <h2>Laporan Stok</h2>
        <p>Rekap data stok secara berkala untuk pengawasan.</p>
    </a>
    <a href="{{ route('suppliers.index') }}" class="card fade-delay-4" style="background: #f39c12; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px; text-decoration: none;">
        <h2>Data Supplier</h2>
        <p>Kelola informasi supplier yang menyuplai barang ke kantin.</p>
    </a>
    <a href="{{ route('items.index') }}" class="card fade-delay-5" style="background: #1abc9c; color: white; padding: 20px; border-radius: 8px; flex: 1; min-width: 200px; text-decoration: none;">
        <h2>Kelola Data Barang</h2>
        <p>Masuk ke halaman utama pengelolaan semua barang kantin.</p>
    </a>
</div>
@endsection

