@extends('layouts.app')

@section('title', 'laporan stok')

@section('content')
<div style="padding: 40px; max-width: 1100px; margin: auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #2c3e50;">
    <h2 style="margin-bottom: 20px; font-size: 26px; font-weight: 700; border-bottom: 3px solid #16a085; padding-bottom: 0.3rem;">
        📃Laporan Stok
    </h2>

    <form method="GET" action="{{ route('laporan.index') }}" style="display: flex; align-items: center; gap: 12px; margin-bottom: 30px; flex-wrap: wrap;">
        <label style="font-weight: 600; white-space: nowrap;">periode:</label>
        <input type="date" name="start_date" value="{{ $startDate }}" required
            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; transition: border-color 0.3s;">
        <input type="date" name="end_date" value="{{ $endDate }}" required
            style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; transition: border-color 0.3s;">
        <button type="submit"
            style="background-color: #1abc9c; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer; transition: background-color 0.3s;">
            filter
        </button>
    </form>

    <h3 style="margin-bottom: 12px; font-weight: 600; font-size: 1.4rem; color: #16a085; border-left: 4px solid #16a085; padding-left: 10px;">
        stok tersedia
    </h3>
    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <thead>
            <tr style="background: #16a085; color: white; font-weight: 600;">
                <th style="padding: 12px 15px; text-align: left;">nama barang</th>
                <th style="padding: 12px 15px; text-align: center;">stok</th>
                <th style="padding: 12px 15px; text-align: left;">tanggal kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr style="background: #f9f9f9; border-bottom: 1px solid #ddd; font-weight: {{ $item->stok <= 0 ? '600' : '400' }}; color: {{ $item->stok <= 0 ? '#721c24' : '#2c3e50' }}; background-color: {{ $item->stok <= 0 ? '#f8d7da' : '#f9f9f9' }};">
                <td style="padding: 12px 15px;">{{ $item->nama_barang }}</td>
                <td style="padding: 12px 15px; text-align: center;">{{ $item->stok }}</td>
                <td style="padding: 12px 15px;">{{ $item->tanggal_kadaluarsa ? $item->tanggal_kadaluarsa->format('d-m-Y') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3 style="margin-bottom: 12px; font-weight: 600; font-size: 1.4rem; color: #16a085; border-left: 4px solid #16a085; padding-left: 10px;">
        barang masuk periode {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
    </h3>
    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <thead>
            <tr style="background: #16a085; color: white; font-weight: 600;">
                <th style="padding: 12px 15px; text-align: left;">nama barang</th>
                <th style="padding: 12px 15px; text-align: center;">jumlah masuk</th>
                <th style="padding: 12px 15px; text-align: left;">tanggal masuk</th>
                <th style="padding: 12px 15px; text-align: left;">keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pemasukans as $p)
            <tr style="background: #f9f9f9; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px 15px;">{{ $p->item->nama_barang ?? '-' }}</td>
                <td style="padding: 12px 15px; text-align: center;">{{ $p->jumlah_masuk }}</td>
                <td style="padding: 12px 15px;">{{ $p->tanggal_masuk->format('d-m-Y') }}</td>
                <td style="padding: 12px 15px;">{{ $p->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr style="background: #f9f9f9;">
                <td colspan="4" style="padding: 12px 15px; text-align: center; color: #777;">tidak ada data pemasukan pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3 style="margin-bottom: 12px; font-weight: 600; font-size: 1.4rem; color: #16a085; border-left: 4px solid #16a085; padding-left: 10px;">
        barang keluar periode {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
    </h3>
    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <thead>
            <tr style="background: #16a085; color: white; font-weight: 600;">
                <th style="padding: 12px 15px; text-align: left;">nama barang</th>
                <th style="padding: 12px 15px; text-align: center;">jumlah keluar</th>
                <th style="padding: 12px 15px; text-align: left;">tanggal keluar</th>
                <th style="padding: 12px 15px; text-align: left;">keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluarans as $p)
            <tr style="background: #f9f9f9; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px 15px;">{{ $p->item->nama_barang ?? '-' }}</td>
                <td style="padding: 12px 15px; text-align: center;">{{ $p->jumlah_keluar }}</td>
                <td style="padding: 12px 15px;">{{ $p->tanggal_keluar->format('d-m-Y') }}</td>
                <td style="padding: 12px 15px;">{{ $p->keterangan ?? '-' }}</td>
            </tr>
            @empty
            <tr style="background: #f9f9f9;">
                <td colspan="4" style="padding: 12px 15px; text-align: center; color: #777;">tidak ada data pengeluaran pada periode ini.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3 style="margin-bottom: 12px; font-weight: 600; font-size: 1.4rem; color: #16a085; border-left: 4px solid #16a085; padding-left: 10px;">
        barang hampir kadaluarsa (kurang dari 30 hari)
    </h3>
    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <thead>
            <tr style="background: #16a085; color: white; font-weight: 600;">
                <th style="padding: 12px 15px; text-align: left;">nama barang</th>
                <th style="padding: 12px 15px; text-align: center;">stok</th>
                <th style="padding: 12px 15px; text-align: left;">tanggal kadaluarsa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nearExpireItems as $item)
            <tr style="background: #fff3cd; font-weight: 600; color: #856404; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px 15px;">{{ $item->nama_barang }}</td>
                <td style="padding: 12px 15px; text-align: center;">{{ $item->stok }}</td>
                <td style="padding: 12px 15px;">{{ $item->tanggal_kadaluarsa->format('d-m-Y') }}</td>
            </tr>
            @empty
            <tr style="background: #f9f9f9;">
                <td colspan="3" style="padding: 12px 15px; text-align: center; color: #777;">tidak ada barang hampir kadaluarsa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <h3 style="margin-bottom: 12px; font-weight: 600; font-size: 1.4rem; color: #16a085; border-left: 4px solid #16a085; padding-left: 10px;">
        barang habis
    </h3>
    <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-bottom: 2rem;">
        <thead>
            <tr style="background: #16a085; color: white; font-weight: 600;">
                <th style="padding: 12px 15px; text-align: left;">nama barang</th>
                <th style="padding: 12px 15px; text-align: center;">stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($outOfStockItems as $item)
            <tr style="background: #f8d7da; font-weight: 600; color: #721c24; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px 15px;">{{ $item->nama_barang }}</td>
                <td style="padding: 12px 15px; text-align: center;">{{ $item->stok }}</td>
            </tr>
            @empty
            <tr style="background: #f9f9f9;">
                <td colspan="2" style="padding: 12px 15px; text-align: center; color: #777;">tidak ada barang habis.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
