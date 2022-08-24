<div class="container">
    <div class="col-md-4 col-sm-6 col-12 mx-auto my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-0">LOGIN</h2>
                <p class="small text-muted text-center">Please login with your account.</p>
                <hr>
                <form action="{{ url('api/v1/auth/login') }}" method="post" data-request="ajax" data-callback="{{ route('dashboard') }}">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.title = "{{ $title ?? 'Untitle Page' }} | Akademik App";

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
