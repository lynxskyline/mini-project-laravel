<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')
            ->latest()
            ->paginate(10);

        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('barangs.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'kode_barang' => [
                'required',
                'string',
                'max:20',
                'unique:barangs,kode_barang',
            ],
            'nama_barang' => ['required', 'string', 'min:3', 'max:150'],
            'spesifikasi' => ['nullable', 'string'],
            'stok' => ['required', 'integer', 'min:0'],
            'kondisi' => [
                'required',
                Rule::in(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            ],
            'status' => [
                'required',
                Rule::in(['Tersedia', 'Dipinjam', 'Maintenance']),
            ],
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }

    public function show(Barang $barang)
    {
        $barang->load('kategori');

        return view('barangs.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view(
            'barangs.edit',
            compact('barang', 'kategoris')
        );
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'kode_barang' => ['required', 'string', 'max:20',
                Rule::unique('barangs', 'kode_barang') ->ignore($barang->id),
            ],
            'nama_barang' => ['required', 'string', 'min:3', 'max:150'],
            'spesifikasi' => ['nullable', 'string'],
            'stok' => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', Rule::in(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            ],
            'status' => [ 'required', Rule::in(['Tersedia', 'Dipinjam', 'Maintenance']),
            ],
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barangs.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}