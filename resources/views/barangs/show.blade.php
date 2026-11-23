
@extends('layouts.app')

@section('title', 'Detail Barang | SIMLAB-RPL')

@section('content')
    <div class="mb-8">
        <a href="{{ route('barangs.index') }}"
           class="text-sm font-medium text-blue-600 hover:underline">
            &larr; Kembali ke Data Barang
        </a>

        <h1 class="mt-4 text-3xl font-bold text-slate-900">
            Detail Barang
        </h1>

        <p class="mt-2 text-slate-600">
            Informasi lengkap inventaris laboratorium.
        </p>
    </div>

    <div class="mx-auto max-w-3xl overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 bg-slate-50 px-6 py-5">
            <h2 class="text-xl font-bold text-slate-900">
                {{ $barang->nama_barang }}
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Kode: {{ $barang->kode_barang }}
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2">
            <div>
                <p class="text-sm text-slate-500">Kategori</p>
                <p class="mt-1 font-semibold text-slate-800">
                    {{ $barang->kategori->nama_kategori ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Stok</p>
                <p class="mt-1 font-semibold text-slate-800">
                    {{ $barang->stok }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Kondisi</p>
                <p class="mt-1 font-semibold text-slate-800">
                    {{ $barang->kondisi }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Status</p>
                <p class="mt-1 font-semibold text-slate-800">
                    {{ $barang->status }}
                </p>
            </div>

            <div class="sm:col-span-2">
                <p class="text-sm text-slate-500">Spesifikasi</p>
                <p class="mt-1 whitespace-pre-line text-slate-800">
                    {{ $barang->spesifikasi ?: 'Tidak ada spesifikasi.' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Dibuat</p>
                <p class="mt-1 text-slate-800">
                    {{ $barang->created_at?->format('d-m-Y H:i') ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-sm text-slate-500">Terakhir diperbarui</p>
                <p class="mt-1 text-slate-800">
                    {{ $barang->updated_at?->format('d-m-Y H:i') ?? '-' }}
                </p>
            </div>
        </div>

        <div class="flex flex-col gap-3 border-t border-slate-200 px-6 py-5 sm:flex-row sm:justify-end">
            <a href="{{ route('barangs.index') }}"
               class="rounded-lg border border-slate-300 px-5 py-3 text-center font-semibold text-slate-700 hover:bg-slate-50">
                Kembali
            </a>

            <a href="{{ route('barangs.edit', $barang) }}"
               class="rounded-lg bg-amber-500 px-5 py-3 text-center font-semibold text-white hover:bg-amber-600">
                Edit Barang
            </a>
        </div>
    </div>
@endsection
