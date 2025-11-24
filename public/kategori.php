<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori · DiArsip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/kategori.css">
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
                <a class="nav-link" href="dokumen.php"><i class="bx bx-folder"></i> Dokumen</a>
                <a class="nav-link active" href="kategori.php"><i class="bx bx-category"></i> Kategori</a>
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
                    <span class="navbar-brand fw-bold">Kategori</span>
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
                    <h1>Kategori</h1>
                </div>

                <!-- Action Bar -->
                <div class="card mb-4">
                    <div class="card-body">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKategoriModal">
                            <i class="bx bx-plus"></i> Tambah Kategori Baru
                        </button>
                    </div>
                </div>

                <!-- Category Tree -->
                <div class="card kategori-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Struktur Kategori</h5>
                        <small class="text-muted">Klik pada kategori untuk melihat sub-kategori</small>
                    </div>
                    <div class="card-body">
                        <div class="kategori-tree">
                            <!-- Main Category 1: Umum -->
                            <div class="kategori-item">
                                <div class="kategori-header">
                                    <button class="kategori-toggle" type="button" data-toggle="category-1">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                    <i class="bx bx-folder"></i>
                                    <span class="kategori-name">Umum</span>
                                    <span class="badge bg-info rounded-pill ms-auto">5 item</span>
                                </div>
                                <div class="kategori-content" id="category-1">
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Kepegawaian</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">2 item</span>
                                        </div>
                                    </div>
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Keuangan</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">3 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Category 2: Pelayanan -->
                            <div class="kategori-item">
                                <div class="kategori-header">
                                    <button class="kategori-toggle" type="button" data-toggle="category-2">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                    <i class="bx bx-folder"></i>
                                    <span class="kategori-name">Pelayanan</span>
                                    <span class="badge bg-info rounded-pill ms-auto">3 item</span>
                                </div>
                                <div class="kategori-content" id="category-2">
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Pengaduan</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">1 item</span>
                                        </div>
                                    </div>
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Layanan Umum</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">2 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Category 3: Administrasi -->
                            <div class="kategori-item">
                                <div class="kategori-header">
                                    <button class="kategori-toggle" type="button" data-toggle="category-3">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                    <i class="bx bx-folder"></i>
                                    <span class="kategori-name">Administrasi</span>
                                    <span class="badge bg-info rounded-pill ms-auto">4 item</span>
                                </div>
                                <div class="kategori-content" id="category-3">
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Surat Masuk</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">2 item</span>
                                        </div>
                                    </div>
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Surat Keluar</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">2 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Category 4: Laporan -->
                            <div class="kategori-item">
                                <div class="kategori-header">
                                    <button class="kategori-toggle" type="button" data-toggle="category-4">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                    <i class="bx bx-folder"></i>
                                    <span class="kategori-name">Laporan</span>
                                    <span class="badge bg-info rounded-pill ms-auto">6 item</span>
                                </div>
                                <div class="kategori-content" id="category-4">
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Laporan Bulanan</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">3 item</span>
                                        </div>
                                    </div>
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Laporan Tahunan</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">3 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Category 5: Proyek -->
                            <div class="kategori-item">
                                <div class="kategori-header">
                                    <button class="kategori-toggle" type="button" data-toggle="category-5">
                                        <i class="bx bx-chevron-right"></i>
                                    </button>
                                    <i class="bx bx-folder"></i>
                                    <span class="kategori-name">Proyek</span>
                                    <span class="badge bg-info rounded-pill ms-auto">8 item</span>
                                </div>
                                <div class="kategori-content" id="category-5">
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Dokumentasi</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">4 item</span>
                                        </div>
                                    </div>
                                    <div class="sub-kategori">
                                        <div class="kategori-header sub">
                                            <i class="bx bx-folder-minus"></i>
                                            <span class="kategori-name">Proposal</span>
                                            <span class="badge bg-light text-dark rounded-pill ms-auto">4 item</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Stats -->
                <div class="row g-4 mt-4">
                    <div class="col-12 col-md-4">
                        <div class="stats-card-mini">
                            <div class="stats-icon-mini"><i class="bx bx-category"></i></div>
                            <div class="stats-info-mini">
                                <div class="label">Total Kategori</div>
                                <div class="value">5</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="stats-card-mini">
                            <div class="stats-icon-mini"><i class="bx bx-folder-open"></i></div>
                            <div class="stats-info-mini">
                                <div class="label">Sub Kategori</div>
                                <div class="value">10</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="stats-card-mini">
                            <div class="stats-icon-mini"><i class="bx bx-file"></i></div>
                            <div class="stats-info-mini">
                                <div class="label">Total Dokumen</div>
                                <div class="value">234</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer bg-white text-center py-3 border-top mt-4">
                &copy; <?php echo date('Y'); ?> DiArsip — Sistem Pengelolaan Arsip Digital
            </footer>
        </main>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategoriModal" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKategoriLabel">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tambahKategoriForm">
                        <div class="mb-3">
                            <label for="kategoriNama" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="kategoriNama" placeholder="Masukkan nama kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="kategoriParent" class="form-label">Kategori Induk (Opsional)</label>
                            <select class="form-select" id="kategoriParent">
                                <option selected>-- Tidak ada (Kategori Utama) --</option>
                                <option>Umum</option>
                                <option>Pelayanan</option>
                                <option>Administrasi</option>
                                <option>Laporan</option>
                                <option>Proyek</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="kategoriDeskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="kategoriDeskripsi" rows="3" placeholder="Masukkan deskripsi kategori"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Kategori</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/responsive.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/kategori.js"></script>
</body>
</html>
