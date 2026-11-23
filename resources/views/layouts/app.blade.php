
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIMLAB-RPL')</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">

    <nav class="bg-slate-900 text-white shadow-lg">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">
                SIMLAB-RPL
            </a>

            <div class="flex gap-5 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="hover:text-blue-300">
                    Dashboard
                </a>

                <a href="{{ route('barangs.index') }}" class="hover:text-blue-300">
                    Data Barang
                </a>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-4 py-8">
        @if (session('success'))
            <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="mt-10 border-t border-slate-200 py-5 text-center text-sm text-slate-500">
        Sistem Manajemen Inventaris Lab RPL
    </footer>

</body>
</html>