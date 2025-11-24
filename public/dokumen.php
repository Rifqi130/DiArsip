<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen · DiArsip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/dokumen.css">
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
                <a class="nav-link" href="dashboard.php"><i class="bx bx-home"></i> Dashboard</a>
                <a class="nav-link active" href="dokumen.php"><i class="bx bx-folder"></i> Dokumen</a>
                <a class="nav-link" href="kategori.php"><i class="bx bx-category"></i> Kategori</a>
            </nav>
            <div class="sidebar-footer mt-auto p-3">
                <div class="fw-bold mb-2">Quick Menu</div>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="bx bx-data"></i> Backup Database</a>
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="bx bx-file"></i> Backup Dokumen</a>
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="bx bx-user"></i> Data User</a>
                </div>
            </div>
        </aside>
        <!-- Main -->
        <main class="flex-grow-1 bg-light">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg bg-white shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand fw-bold">Dokumen</span>
                    <div class="ms-auto">
                        <span class="me-3">Admin</span>
                        <img src="/images/logo.svg" alt="Logo" height="32" class="align-middle">
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid py-4">
                <!-- Page Header -->
                <div class="page-header mb-4">
                    <h1>Dokumen</h1>
                </div>

                <!-- Filter & Action Bar -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary active"><i class="bx bx-th-large"></i> Tampilkan Baru</button>
                                    <button type="button" class="btn btn-outline-primary"><i class="bx bx-time"></i> Tanpa Diubah Date</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label small">Pilihan Kategori</label>
                                <select class="form-select form-select-sm">
                                    <option selected>Semua Kategori</option>
                                    <option>Surat Masuk</option>
                                    <option>Surat Keluar</option>
                                    <option>Laporan</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control form-control-sm" placeholder="Show entries">
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">Search</span>
                                    <input type="text" class="form-control" placeholder="Cari dokumen...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Documents Table -->
                <div class="card dokumen-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Dokumen</h5>
                        <div class="text-muted small">Klik Action ada 2 button, edit dan delete</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle dokumen-table">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 60px;">No</th>
                                        <th>Judul</th>
                                        <th>Tgl Upload</th>
                                        <th>File</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="dokumen-row">
                                        <td><span class="badge bg-light text-dark">1</span></td>
                                        <td>
                                            <div class="dokumen-title">
                                                <i class="bx bx-file"></i>
                                                <span>Dokumen Penting Tahun 2023</span>
                                            </div>
                                        </td>
                                        <td>2023-11-10</td>
                                        <td><span class="badge bg-info">dokumen1.pdf</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="dokumen-row">
                                        <td><span class="badge bg-light text-dark">2</span></td>
                                        <td>
                                            <div class="dokumen-title">
                                                <i class="bx bx-file"></i>
                                                <span>Laporan Bulanan November</span>
                                            </div>
                                        </td>
                                        <td>2023-11-09</td>
                                        <td><span class="badge bg-info">laporan_nov.pdf</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="dokumen-row">
                                        <td><span class="badge bg-light text-dark">3</span></td>
                                        <td>
                                            <div class="dokumen-title">
                                                <i class="bx bx-file"></i>
                                                <span>Surat Edaran Terbaru</span>
                                            </div>
                                        </td>
                                        <td>2023-11-08</td>
                                        <td><span class="badge bg-info">surat_edaran.pdf</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="dokumen-row">
                                        <td><span class="badge bg-light text-dark">4</span></td>
                                        <td>
                                            <div class="dokumen-title">
                                                <i class="bx bx-file"></i>
                                                <span>Data Arsip Elektronik 2023</span>
                                            </div>
                                        </td>
                                        <td>2023-11-07</td>
                                        <td><span class="badge bg-info">arsip_2023.xlsx</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr class="dokumen-row">
                                        <td><span class="badge bg-light text-dark">5</span></td>
                                        <td>
                                            <div class="dokumen-title">
                                                <i class="bx bx-file"></i>
                                                <span>Notulensi Rapat Koordinasi</span>
                                            </div>
                                        </td>
                                        <td>2023-11-06</td>
                                        <td><span class="badge bg-info">notulen_rapat.docx</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bx bx-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="bx bx-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="card-footer bg-white">
                        <nav aria-label="Table pagination">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer bg-white text-center py-3 border-top mt-4">
                &copy; <?php echo date('Y'); ?> DiArsip — Sistem Pengelolaan Arsip Digital
            </footer>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/responsive.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/dokumen.js"></script>
</body>
</html>
