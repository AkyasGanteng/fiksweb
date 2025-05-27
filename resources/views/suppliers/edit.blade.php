@extends('layouts.app')

@section('content')
<style>
  /* sama kayak create, bisa pake class form-container dan stylingnya */
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
  input[type="email"],
  textarea {
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
  <h2>Edit Supplier</h2>
  <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nama_supplier">Nama Supplier</label>
    <input type="text" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>

    <label for="kontak">Kontak</label>
    <input type="text" id="kontak" name="kontak" value="{{ $supplier->kontak }}" required>

    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" rows="3" required>{{ $supplier->alamat }}</textarea>

    <label for="email">Email (opsional)</label>
    <input type="email" id="email" name="email" value="{{ $supplier->email }}">

    <label for="keterangan">Keterangan (opsional)</label>
    <textarea id="keterangan" name="keterangan" rows="2">{{ $supplier->keterangan }}</textarea>

    <button type="submit" class="btn-submit">Update</button>
    <a href="{{ route('suppliers.index') }}" class="btn-cancel">Batal</a>
  </form>
</div>
@endsection
