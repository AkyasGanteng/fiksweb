@extends('layouts.app')

@section('content')
<style>
  .form-container {
    max-width: 500px;
    background: white;
    margin: 30px auto;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 6px 15px rgb(0 0 0 / 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  .form-container h2 {
    margin-bottom: 25px;
    color: #1abc9c;
  }
  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #34495e;
  }
  input, textarea, select {
    width: 100%;
    padding: 10px 14px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
  }
  .error-message {
    color: red;
    font-size: 13px;
    margin-top: -15px;
    margin-bottom: 10px;
  }
  button.btn-submit {
    background-color: #1abc9c;
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 6px;
    font-weight: 700;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button.btn-submit:hover {
    background-color: #159e86;
  }
</style>

<div class="form-container">
  <h2>Tambah Pengeluaran Stok</h2>

  @if(session('error'))
      <div class="error-message">{{ session('error') }}</div>
  @endif

  <form action="{{ route('pengeluaran.store') }}" method="POST">
    @csrf

    <label for="item_id">Pilih Barang</label>
    <select name="item_id" id="item_id">
      <option value="">-- Pilih Barang --</option>
      @foreach($items as $item)
        <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
          {{ $item->nama_barang }} (Stok: {{ $item->stok }})
        </option>
      @endforeach
    </select>
    @error('item_id') <div class="error-message">{{ $message }}</div> @enderror

    <label for="jumlah_keluar">Jumlah Keluar</label>
    <input type="number" name="jumlah_keluar" id="jumlah_keluar" value="{{ old('jumlah_keluar') }}">
    @error('jumlah_keluar') <div class="error-message">{{ $message }}</div> @enderror

    <label for="tanggal_keluar">Tanggal Keluar</label>
    <input type="date" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}">
    @error('tanggal_keluar') <div class="error-message">{{ $message }}</div> @enderror

    <label for="keterangan">Keterangan</label>
    <textarea name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
    @error('keterangan') <div class="error-message">{{ $message }}</div> @enderror

    <button type="submit" class="btn-submit">Simpan</button>
  </form>
</div>
@endsection
