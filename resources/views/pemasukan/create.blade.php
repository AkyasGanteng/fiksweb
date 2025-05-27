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
  <h2>Tambah Pemasukan Stok</h2>

  @if($errors->any())
    <div style="color: red; margin-bottom: 15px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('pemasukan.store') }}" method="POST">
    @csrf

    <label for="item_id">Barang</label>
    <select name="item_id" id="item_id" required>
      <option value="">-- pilih barang --</option>
      @foreach ($items as $item)
        <option value="{{ $item->id }}" {{ old('item_id') == $item->id ? 'selected' : '' }}>
          {{ $item->nama_barang }}
        </option>
      @endforeach
    </select>

    <label for="jumlah_masuk">Jumlah Masuk</label>
    <input type="number" id="jumlah_masuk" name="jumlah_masuk" value="{{ old('jumlah_masuk') }}" min="1" required>

    <label for="tanggal_masuk">Tanggal Masuk</label>
    <input type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') ?? date('Y-m-d') }}" required>

    <label for="keterangan">Keterangan (opsional)</label>
    <textarea id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>

    <button type="submit" class="btn-submit">Simpan</button>
    <a href="{{ route('pemasukan.index') }}" class="btn-cancel">Batal</a>
  </form>
</div>
@endsection
