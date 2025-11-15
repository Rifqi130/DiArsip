@extends('layouts.auth')

@section('content')
<div class="page-bg d-flex align-items-start">
    <header class="w-100 text-center py-4">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo img-fluid">
    </header>

    <main class="container d-flex justify-content-center align-items-start flex-grow-1">
        <div class="login-outer shadow-sm">
            <div class="row gx-5">
                <div class="col-md-6 left-panel p-4">
                    <div class="inner p-3">
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label small">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" 
                                       id="username" name="username" value="{{ old('username') }}" 
                                       placeholder="Username" required>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label small">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-check small">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div class="mb-3 small text-muted">Panduan Login</div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 right-panel p-4 d-flex align-items-center">
                    <div class="info p-3 text-center w-100">
                        <h4 class="fw-bold">DiArsip</h4>
                        <p class="mt-3 text-muted">Sistem Pengelolaan Arsip Digital Modern</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-100 text-center py-4 small text-muted">
        &copy; {{ date('Y') }} DiArsip
    </footer>
</div>
@endsection