    @extends('layouts.app')

    @section('title', 'Data Supplier')

    @section('content')
    <div style="padding: 40px; max-width: 1100px; margin: auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        <h2 style="margin-bottom: 20px; font-size: 26px; font-weight: 700; color: #2c3e50;">🏢 Data Supplier</h2>

        @if(session('success'))
            <div style="background: #eafaf1; color: #2e7d32; padding: 12px; border-radius: 6px; margin-bottom: 20px; font-weight: 600;">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('suppliers.create') }}"
        style="display: inline-block; background: #1abc9c; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-bottom: 20px; transition: background-color 0.3s;">
        + Tambah Supplier Baru
        </a>

        <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background: #16a085; color: white; font-weight: 600;">
                    <th style="padding: 12px;">#</th>
                    <th style="padding: 12px;">Nama Supplier</th>
                    <th style="padding: 12px;">Kontak</th>
                    <th style="padding: 12px;">Alamat</th>
                    <th style="padding: 12px;">Email</th>
                    <th style="padding: 12px;">Keterangan</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr style="text-align: center; background: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $loop->iteration + ($suppliers->currentPage() -1)*$suppliers->perPage() }}</td>
                        <td style="text-align: left; padding-left: 15px;">{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->kontak }}</td>
                        <td style="text-align: left; padding-left: 15px;">{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->email ?? '-' }}</td>
                        <td>{{ $supplier->keterangan ?? '-' }}</td>
                        <td style="display: flex; justify-content: center; gap: 8px;">
                            <!-- Edit -->
                            <a href="{{ route('suppliers.edit', $supplier) }}"
                            style="
                                    background-color: #1abc9c;
                                    color: white;
                                    padding: 6px 14px;
                                    border-radius: 6px;
                                    font-weight: 600;
                                    text-decoration: none;
                                    font-size: 0.9rem;
                                    transition: background-color 0.3s;
                                    display: inline-block;
                                    ">
                                Edit
                            </a>

                            <!-- Hapus -->
                            <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus supplier ini?')" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    style="
                                        background-color: #e74c3c;
                                        color: white;
                                        border: none;
                                        padding: 6px 14px;
                                        border-radius: 6px;
                                        font-weight: 600;
                                        cursor: pointer;
                                        font-size: 0.9rem;
                                        transition: background-color 0.3s;
                                    "
                                    onmouseover="this.style.backgroundColor='#c0392b';"
                                    onmouseout="this.style.backgroundColor='#e74c3c';"
                                >Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" style="padding: 20px; text-align: center; color: #777;">Tidak ada data supplier.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top: 30px;">{{ $suppliers->links() }}</div>
    </div>
    @endsection
