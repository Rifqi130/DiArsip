<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard · DiArsip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="dashboard-wrapper d-flex min-vh-100">
        <!-- Sidebar -->
        <aside class="sidebar bg-white border-end">
            <div class="sidebar-header text-center py-4">
                <img src="/images/logo.svg" alt="Logo" height="40" class="mb-2">
                <div class="fw-bold fs-5">DiArsip</div>
                <div class="text-muted small">Deskripsi singkat aplikasi</div>
            </div>
            <nav class="nav flex-column mt-4">
                <a class="nav-link active" href="dashboard.php"><i class="bx bx-home"></i> Dashboard</a>
                <a class="nav-link" href="dokumen.php"><i class="bx bx-folder"></i> Dokumen</a>
                <a class="nav-link" href="kategori.php"><i class="bx bx-category"></i> Kategori</a>
            </nav>
            <div class="sidebar-footer mt-auto p-3">
                <div class="fw-bold mb-2">Quick Menu</div>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-outline-primary"><i class="bx bx-data"></i> Backup Database</a>
                    <a href="#" class="btn btn-outline-primary"><i class="bx bx-file"></i> Backup Dokumen</a>
                    <a href="#" class="btn btn-outline-primary"><i class="bx bx-user"></i> Data User</a>
                </div>
            </div>
        </aside>
        <!-- Main -->
        <main class="flex-grow-1 bg-light">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-white shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand fw-bold">Dashboard</span>
                    <div class="ms-auto">
                        <span class="me-3">Admin</span>
                        <img src="/images/logo.svg" alt="Logo" height="32" class="align-middle">
                    </div>
                </div>
            </nav>
            <!-- Header Cards -->
            <div class="container py-4">
                <div class="row g-4 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="stats-card text-center">
                            <div class="stats-icon mx-auto mb-2"><i class="bx bx-file"></i></div>
                            <div class="stats-info">
                                <div class="fw-bold">Total Dokumen</div>
                                <div class="stats-number fs-4">234</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="stats-card text-center">
                            <div class="stats-icon mx-auto mb-2"><i class="bx bx-data"></i></div>
                            <div class="stats-info">
                                <div class="fw-bold">Total Size</div>
                                <div class="stats-number fs-4">1.2 GB</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="stats-card text-center">
                            <div class="stats-icon mx-auto mb-2"><i class="bx bx-category"></i></div>
                            <div class="stats-info">
                                <div class="fw-bold">Total Kategori</div>
                                <div class="stats-number fs-4">12</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="stats-card text-center">
                            <div class="stats-icon mx-auto mb-2"><i class="bx bx-plus-circle"></i></div>
                            <div class="stats-info">
                                <div class="fw-bold">Tambah Arsip</div>
                                <a href="#" class="btn btn-primary btn-sm mt-2">Upload</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Content -->
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Dokumen</h5>
                                <div class="d-flex gap-2">
                                    <select class="form-select form-select-sm">
                                        <option>Semua Kategori</option>
                                    </select>
                                    <input type="text" class="form-control form-control-sm" placeholder="Search">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tgl Upload</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Dokumen Contoh 1</td>
                                                <td>2023-11-10</td>
                                                <td>dokumen1.pdf</td>
                                                <td>
                                                    <button class="btn btn-sm btn-light" title="View"><i class="bx bx-show"></i></button>
                                                    <button class="btn btn-sm btn-light" title="Edit"><i class="bx bx-edit"></i></button>
                                                    <button class="btn btn-sm btn-light" title="Delete"><i class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Dokumen Contoh 2</td>
                                                <td>2023-11-09</td>
                                                <td>dokumen2.pdf</td>
                                                <td>
                                                    <button class="btn btn-sm btn-light" title="View"><i class="bx bx-show"></i></button>
                                                    <button class="btn btn-sm btn-light" title="Edit"><i class="bx bx-edit"></i></button>
                                                    <button class="btn btn-sm btn-light" title="Delete"><i class="bx bx-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0">Kategori</h5>
                            </div>
                            <div class="card-body">
                                <div class="category-list">
                                    <a href="#" class="category-item active"><i class="bx bx-folder"></i> Semua <span class="badge bg-primary rounded-pill ms-auto">145</span></a>
                                    <a href="#" class="category-item"><i class="bx bx-folder"></i> Surat Masuk <span class="badge bg-secondary rounded-pill ms-auto">45</span></a>
                                    <a href="#" class="category-item"><i class="bx bx-folder"></i> Surat Keluar <span class="badge bg-secondary rounded-pill ms-auto">32</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Quick Menu</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-3">
                                    <a href="#" class="quick-menu-card">
                                        <i class="bx bx-data"></i>
                                        <h4>Backup Database</h4>
                                        <p>Backup seluruh data aplikasi</p>
                                    </a>
                                    <a href="#" class="quick-menu-card">
                                        <i class="bx bx-file"></i>
                                        <h4>Backup Dokumen</h4>
                                        <p>Backup seluruh file dokumen</p>
                                    </a>
                                    <a href="#" class="quick-menu-card">
                                        <i class="bx bx-user"></i>
                                        <h4>Data User</h4>
                                        <p>Kelola data pengguna</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer bg-white text-center py-3 border-top">
                &copy; <?php echo date('Y'); ?> DiArsip
            </footer>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/responsive.js"></script>
    <script src="/js/dashboard.js"></script>
</body>
</html>
