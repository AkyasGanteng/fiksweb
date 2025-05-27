@extends('layouts.app')

@section('title', 'Edit Pengeluaran Stok')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        color: #333;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h2 {
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #2c3e50;
        font-weight: 700;
        text-align: center;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }
    input[type="number"], input[type="date"], select, textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1.5px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 20px;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }
    input:focus, select:focus, textarea:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52,152,219,0.5);
    }
    button {
        background-color: #3498db;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
        font-size: 1.1rem;
    }
    button:hover {
        background-color: #2980b9;
    }
    .btn-secondary {
        background-color: #7f8c8d;
        margin-top: 10px;
        text-align: center;
        display: inline-block;
        width: auto;
        padding: 10px 20px;
        border-radius: 8px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
    }
    .btn-secondary:hover {
        background-color: #636e72;
    }
    .error-list {
        background-color: #fdecea;
        color: #d93025;
        border: 1px solid #d93025;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-weight: 600;
        list-style-type: disc;
        list-style-position: inside;
    }
</style>

<div class="container">
    <h2>Edit Pengeluaran Stok</h2>

    @if($errors->any())
    <ul class="error-list">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="item_id">Barang</label>
        <select name="item_id" id="item_id" required>
            <option value="">-- Pilih Barang --</option>
            @foreach($items as $item)
                <option value="{{ $item->id }}" {{ old('item_id', $pengeluaran->item_id) == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_barang }}
                </option>
            @endforeach
        </select>

        <label for="jumlah_keluar">Jumlah Keluar</label>
        <input type="number" id="jumlah_keluar" name="jumlah_keluar" value="{{ old('jumlah_keluar', $pengeluaran->jumlah_keluar) }}" min="1" required>

        <label for="tanggal_keluar">Tanggal Keluar</label>
        <input type="date" id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar', optional($pengeluaran->tanggal_keluar)->format('Y-m-d')) }}" required>

        <label for="keterangan">Keterangan (optional)</label>
        <textarea id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>

        <button type="submit">Update Pengeluaran</button>
    </form>

    <a href="{{ route('pengeluaran.index') }}" class="btn-secondary">Batal</a>
</div>
@endsection
