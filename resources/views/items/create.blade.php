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
  input[type="text"],
  input[type="number"],
  input[type="date"],
  textarea,
  select {
    width: 100%;
    padding: 10px 14px;
    margin-bottom: 20px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
    resize: vertical;
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
  a.btn-cancel {
    margin-left: 15px;
    color: #e74c3c;
    text-decoration: none;
    font-weight: 600;
  }
  a.btn-cancel:hover {
    text-decoration: underline;
  }
</style>

<div class="form-container">
  <h2>Tambah Barang Baru</h2>
  <form action="{{ route('items.store') }}" method="POST">
    @csrf

    <label for="nama_barang">Nama Barang</label>
    <input type="text" id="nama_barang" name="nama_barang" required>

    <label for="kategori">Kategori</label>
    <input type="text" id="kategori" name="kategori" required>

    

    <label for="harga_beli">Harga Beli</label>
    <input type="number" id="harga_beli" name="harga_beli" required>

    <label for="harga_jual">Harga Jual</label>
    <input type="number" id="harga_jual" name="harga_jual" required>

    <label for="tanggal_masuk">Tanggal Masuk</label>
    <input type="date" id="tanggal_masuk" name="tanggal_masuk" required>

    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
    <input type="date" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa">

    <button type="submit" class="btn-submit">Simpan</button>
    <a href="{{ route('items.index') }}" class="btn-cancel">Batal</a>
  </form>
</div>
@endsection
