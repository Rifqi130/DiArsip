@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-header">
    <h1>Dashboard</h1>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon">
                <i class="bx bx-file"></i>
            </div>
            <div class="stats-info">
                <h3>Total Dokumen</h3>
                <div class="stats-number">234</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon">
                <i class="bx bx-data"></i>
            </div>
            <div class="stats-info">
                <h3>Total Size</h3>
                <div class="stats-number">1.2 GB</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon">
                <i class="bx bx-category"></i>
            </div>
            <div class="stats-info">
                <h3>Total Kategori</h3>
                <div class="stats-number">12</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card">
            <div class="stats-icon">
                <i class="bx bx-plus-circle"></i>
            </div>
            <div class="stats-info">
                <h3>Tambah Arsip</h3>
                <a href="#" class="btn btn-primary btn-sm mt-2">Upload</a>
            </div>
        </div>
    </div>
</div>

<!-- Document List -->
<div class="row">
    <div class="col-12 col-lg-9">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Dokumen</h5>
                <div class="card-actions">
                    <select class="form-select form-select-sm">
                        <option>Semua Kategori</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
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
                                    <button class="btn btn-sm btn-icon btn-light" title="View">
                                        <i class="bx bx-show"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-icon btn-light" title="Delete">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Kategori</h5>
            </div>
            <div class="card-body">
                <div class="category-list">
                    <a href="#" class="category-item active">
                        <i class="bx bx-folder"></i>
                        <span>Semua</span>
                        <span class="badge bg-primary rounded-pill">145</span>
                    </a>
                    <a href="#" class="category-item">
                        <i class="bx bx-folder"></i>
                        <span>Surat Masuk</span>
                        <span class="badge bg-secondary rounded-pill">45</span>
                    </a>
                    <a href="#" class="category-item">
                        <i class="bx bx-folder"></i>
                        <span>Surat Keluar</span>
                        <span class="badge bg-secondary rounded-pill">32</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Menu -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Menu</h5>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12 col-md-4">
                        <a href="#" class="quick-menu-card">
                            <i class="bx bx-data"></i>
                            <h4>Backup Database</h4>
                            <p>Backup seluruh data aplikasi</p>
                        </a>
                    </div>
                    <div class="col-12 col-md-4">
                        <a href="#" class="quick-menu-card">
                            <i class="bx bx-file"></i>
                            <h4>Backup Dokumen</h4>
                            <p>Backup seluruh file dokumen</p>
                        </a>
                    </div>
                    <div class="col-12 col-md-4">
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
@endsection