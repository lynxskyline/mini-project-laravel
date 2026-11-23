
@extends('layouts.app')

@section('title', 'Data Barang | SIMLAB-RPL')

@section('content')
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-blue-600">
                Inventaris Laboratorium
            </p>
            <h1 class="mt-2 text-3xl font-bold text-slate-900">
                Data Barang
            </h1>
            <p class="mt-2 text-slate-600">
                Kelola seluruh inventaris Laboratorium RPL.
            </p>
        </div>

        <a href="{{ route('barangs.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700">
            + Tambah Barang
        </a>
    </div>

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total Barang</p>
            <p class="mt-2 text-2xl font-bold text-slate-900">
                {{ $barangs->total() }}
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Halaman Saat Ini</p>
            <p class="mt-2 text-2xl font-bold text-blue-600">
                {{ $barangs->currentPage() }}
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Kategori Terdaftar</p>
            <p class="mt-2 text-2xl font-bold text-emerald-600">
                {{ \App\Models\Kategori::count() }}
            </p>
        </div>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-200 px-5 py-4">
            <h2 class="font-semibold text-slate-900">Daftar Inventaris</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4">No.</th>
                        <th class="px-5 py-4">Kode Barang</th>
                        <th class="px-5 py-4">Nama Barang</th>
                        <th class="px-5 py-4">Kategori</th>
                        <th class="px-5 py-4">Stok</th>
                        <th class="px-5 py-4">Kondisi</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($barangs as $barang)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-4 text-slate-500">
                                {{ $barangs->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-4 font-medium text-slate-700">
                                {{ $barang->kode_barang }}
                            </td>

                            <td class="px-5 py-4 font-semibold text-slate-900">
                                {{ $barang->nama_barang }}
                            </td>

                            <td class="px-5 py-4 text-slate-600">
                                {{ $barang->kategori->nama_kategori ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-slate-700">
                                {{ $barang->stok }}
                            </td>

                            <td class="px-5 py-4">
                                @php
                                    $warnaKondisi = match ($barang->kondisi) {
                                        'Baik' => 'bg-emerald-100 text-emerald-700',
                                        'Rusak Ringan' => 'bg-amber-100 text-amber-700',
                                        'Rusak Berat' => 'bg-rose-100 text-rose-700',
                                        default => 'bg-slate-100 text-slate-700',
                                    };
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $warnaKondisi }}">
                                    {{ $barang->kondisi }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                @php
                                    $warnaStatus = match ($barang->status) {
                                        'Tersedia' => 'bg-emerald-100 text-emerald-700',
                                        'Dipinjam' => 'bg-amber-100 text-amber-700',
                                        'Maintenance' => 'bg-rose-100 text-rose-700',
                                        default => 'bg-slate-100 text-slate-700',
                                    };
                                @endphp

                                <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $warnaStatus }}">
                                    {{ $barang->status }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('barangs.show', $barang) }}"
                                       class="font-medium text-blue-600 hover:underline">
                                        Detail
                                    </a>

                                    <a href="{{ route('barangs.edit', $barang) }}"
                                       class="font-medium text-amber-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('barangs.destroy', $barang) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="font-medium text-rose-600 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-12 text-center">
                                <p class="font-semibold text-slate-700">
                                    Belum ada data barang
                                </p>
                                <p class="mt-2 text-sm text-slate-500">
                                    Klik tombol Tambah Barang untuk memasukkan inventaris pertama.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-200 px-5 py-4">
            {{ $barangs->links() }}
        </div>
    </div>
@endsection