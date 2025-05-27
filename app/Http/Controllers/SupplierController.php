<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $suppliers = Supplier::when($keyword, function($q) use ($keyword) {
            $q->where('nama_supplier', 'like', "%$keyword%")
              ->orWhere('kontak', 'like', "%$keyword%")
              ->orWhere('alamat', 'like', "%$keyword%")
              ->orWhere('email', 'like', "%$keyword%");
        })->paginate(10);

        return view('suppliers.index', compact('suppliers', 'keyword'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'kontak' => 'required|string|max:100',
            'alamat' => 'required|string',
            'email' => 'nullable|email|max:255',
            'keterangan' => 'nullable|string',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'kontak' => 'required|string|max:100',
            'alamat' => 'required|string',
            'email' => 'nullable|email|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $supplier->update($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diupdate');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus');
    }
}
