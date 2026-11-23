
@extends('layouts.app')

@section('title', 'Dashboard | SIMLAB-RPL')

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
            Sistem Inventaris Laboratorium
        </p>

        <h1 class="mt-2 text-3xl font-bold text-slate-900">
            Dashboard SIMLAB-RPL
        </h1>

        <p class="mt-2 text-slate-600">
            Kelola data inventaris laboratorium Rekayasa Perangkat Lunak.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Data Inventaris</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900">SIMLAB</h2>
            <p class="mt-2 text-sm text-slate-500">
                Sistem pengelolaan barang laboratorium.
            </p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Kategori</p>
            <h2 class="mt-3 text-3xl font-bold text-blue-600">4</h2>
            <p class="mt-2 text-sm text-slate-500">
                Kategori awal telah disiapkan.
            </p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <p class="text-sm text-slate-500">Pengelolaan Barang</p>
            <a href="{{ route('barangs.index') }}"
               class="mt-3 inline-flex rounded-lg bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                Buka Data Barang
            </a>
        </div>
    </div>
@endsection