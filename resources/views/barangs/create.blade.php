
@extends('layouts.app')

@section('title', 'Tambah Barang | SIMLAB-RPL')

@section('content')
    <div class="mb-8">
        <a href="{{ route('barangs.index') }}"
           class="text-sm font-medium text-blue-600 hover:underline">
            &larr; Kembali ke Data Barang
        </a>

        <h1 class="mt-4 text-3xl font-bold text-slate-900">
            Tambah Barang
        </h1>

        <p class="mt-2 text-slate-600">
            Masukkan informasi inventaris laboratorium.
        </p>
    </div>

    <div class="mx-auto max-w-3xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="kode_barang" class="mb-2 block text-sm font-semibold text-slate-700">
                        Kode Barang
                    </label>
                    <input
                        type="text"
                        id="kode_barang"
                        name="kode_barang"
                        value="{{ old('kode_barang') }}"
                        maxlength="20"
                        required
                        placeholder="Contoh: LPT-001"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                    @error('kode_barang')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nama_barang" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Barang
                    </label>
                    <input
                        type="text"
                        id="nama_barang"
                        name="nama_barang"
                        value="{{ old('nama_barang') }}"
                        minlength="3"
                        maxlength="150"
                        required
                        placeholder="Contoh: Laptop Lenovo"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                    @error('nama_barang')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="kategori_id" class="mb-2 block text-sm font-semibold text-slate-700">
                        Kategori
                    </label>
                    <select
                        id="kategori_id"
                        name="kategori_id"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option
                                value="{{ $kategori->id }}"
                                {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}
                            >
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stok" class="mb-2 block text-sm font-semibold text-slate-700">
                        Stok
                    </label>
                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        value="{{ old('stok', 0) }}"
                        min="0"
                        step="1"
                        required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                    @error('stok')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kondisi" class="mb-2 block text-sm font-semibold text-slate-700">
                        Kondisi Barang
                    </label>
                    <select
                        id="kondisi"
                        name="kondisi"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                        <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    </select>
                    @error('kondisi')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="mb-2 block text-sm font-semibold text-slate-700">
                        Status Barang
                    </label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-slate-300 bg-white px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >
                        <option value="">-- Pilih Status --</option>
                        <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="spesifikasi" class="mb-2 block text-sm font-semibold text-slate-700">
                        Spesifikasi
                        <span class="font-normal text-slate-400">(Opsional)</span>
                    </label>
                    <textarea
                        id="spesifikasi"
                        name="spesifikasi"
                        rows="4"
                        placeholder="Contoh: Intel Core i5, RAM 8 GB, SSD 256 GB"
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    >{{ old('spesifikasi') }}</textarea>
                    @error('spesifikasi')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
                <a
                    href="{{ route('barangs.index') }}"
                    class="rounded-lg border border-slate-300 px-5 py-3 text-center font-semibold text-slate-700 hover:bg-slate-50"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700"
                >
                    Simpan Barang
                </button>
            </div>
        </form>
    </div>
@endsection
