<nav class="navbar navbar-light navbar-expand-lg shadow-sm">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link" data-toggle="ajax">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('student') }}" class="nav-link" data-toggle="ajax">Mahasiswa</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('major') }}" class="nav-link" data-toggle="ajax">Jurusan</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('study-program') }}" class="nav-link" data-toggle="ajax">Program Studi</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('employee') }}" class="nav-link" data-toggle="ajax">Dosen</a>
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
