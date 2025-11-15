<?php
// Static login UI page (UI-only). This file intentionally replaces the Laravel
// front controller to serve a standalone HTML login UI for design/demo purposes.
// It does not perform authentication or bootstrap the Laravel app.
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login · DiArsip</title>
        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/login.css">
    </head>
    <body>
        <div class="page-bg d-flex align-items-start">
            <header class="w-100 text-center py-4">
                <img src="/images/logo.svg" alt="Logo" class="logo img-fluid">
            </header>

            <main class="container d-flex justify-content-center align-items-start flex-grow-1">
                <div class="login-outer shadow-sm">
                    <div class="row gx-5">
                        <div class="col-md-6 left-panel p-4">
                            <div class="inner p-3">
                                <form id="loginForm" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="username" class="form-label small">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username" required>
                                        <div class="invalid-feedback">Masukkan username.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label small">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                                        <div class="invalid-feedback">Masukkan password.</div>
                                    </div>
                                    <div class="mb-3 form-check small">
                                        <input type="checkbox" class="form-check-input" id="remember">
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
                                <h4 class="fw-bold">Di Arsip</h4>
                                <p class="mt-3 text-muted">Aplikasi untuk pengarsipan digital yang efisien dan mudah digunakan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="w-100 text-center py-4 small text-muted">
                &copy; <?php echo date('Y'); ?> DiArsip — UI demo
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/js/login.js"></script>
    </body>
    </html>
