<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Informasi Akademik')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    {{-- HEADER --}}
    <nav class="navbar navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">🎓 SIAKAD</a>
            <span class="navbar-text text-white-50 small">Politeknik Manufaktur Bandung</span>
        </div>
    </nav>

    <div class="d-flex flex-grow-1">

        {{-- SIDEBAR --}}
        @php
            $menu = [
                ['route' => 'dashboard',        'label' => 'Dashboard',        'aktif' => 'dashboard'],
                ['route' => 'mahasiswa.index',  'label' => 'Data Mahasiswa',   'aktif' => 'mahasiswa.*'],
                ['route' => 'dosen.index',      'label' => 'Data Dosen',       'aktif' => 'dosen.*'],
                ['route' => 'matakuliah.index', 'label' => 'Data Mata Kuliah', 'aktif' => 'matakuliah.*'],
            ];
        @endphp

        <aside class="bg-white border-end p-3" style="width: 230px;">
            <ul class="nav nav-pills flex-column gap-1">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($item['aktif']) ? 'active' : 'link-dark' }}"
                           href="{{ route($item['route']) }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        {{-- CONTENT --}}
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>

    </div>

    {{-- FOOTER --}}
    <footer class="bg-white border-top text-center py-3">
        <small class="text-muted">&copy; {{ date('Y') }} Sistem Informasi Akademik</small>
    </footer>

</body>
</html>
