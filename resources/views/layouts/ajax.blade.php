<nav class="navbar navbar-light navbar-expand-lg shadow-sm">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Jurusan</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Program Studi</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('employee') }}" class="nav-link">Dosen</a>
            </li>
        </ul>
    </div>
</nav>

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid my-4">
    @yield('content')
</div>

<script>
    document.title = "{{ $title }} | Akademik App";

    if (!window.jQuery) {
        document.body.innerHTML = "";
        window.location.reload();
    }
</script>

@if (isset($mods))
    @if (is_array($mods))
        @foreach ($mods as $m)
            <script src="{{ asset('mods/mod_' . $m . '.js') }}"></script>
        @endforeach
    @else
        <script src="{{ asset('mods/mod_' . $mods . '.js') }}"></script>
    @endif
@endif

@yield('_js')
