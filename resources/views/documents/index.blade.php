@extends('layouts.app')

@section('title', 'Dokumen')

@section('content')
<div class="page-header mb-4">
    <h1>Manajemen Dokumen</h1>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Filter & Action Bar -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('documents.index') }}" id="filterForm">
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <a href="{{ route('documents.create') }}" class="btn btn-primary w-100">
                        <i class="bx bx-plus"></i> Tambah Dokumen
                    </a>
                </div>
                <div class="col-12 col-md-3">
                    <a href="{{ route('documents.export-excel', request()->all()) }}" class="btn btn-success w-100">
                        <i class="bx bxs-file-export"></i> Export ke Excel
                    </a>
                </div>
                <div class="col-12 col-md-3">
                    <select name="category" class="form-select" onchange="document.getElementById('filterForm').submit()">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari dokumen..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Documents Table -->
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Daftar Dokumen</h5>
        <div class="btn-group">
            <a href="{{ route('documents.index', array_merge(request()->all(), ['export' => 'excel'])) }}" class="btn btn-sm btn-success">
                <i class="bx bx-file"></i> Excel
            </a>
            <a href="{{ route('documents.index', array_merge(request()->all(), ['export' => 'pdf'])) }}" class="btn btn-sm btn-danger">
                <i class="bx bxs-file-pdf"></i> PDF
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nomor Dokumen</th>
                        <th>Judul</th>
                        <th>UPD</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $index => $doc)
                    <tr>
                        <td>{{ $documents->firstItem() + $index }}</td>
                        <td><code>{{ $doc->document_number }}</code></td>
                        <td>{{ $doc->title }}</td>
                        <td>{{ $doc->upd ?? '-' }}</td>
                        <td><span class="badge bg-info">{{ $doc->category->name }}</span></td>
                        <td>{{ $doc->document_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $doc->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ ucfirst($doc->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark">
                                {{ strtoupper($doc->file_type) }} ({{ $doc->file_size_formatted }})
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('documents.show', $doc) }}" class="btn btn-sm btn-info" title="Lihat">
                                <i class="bx bx-show"></i>
                            </a>
                            <a href="{{ route('documents.edit', $doc) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bx bx-edit"></i>
                            </a>
                            <form action="{{ route('documents.destroy', $doc) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted">Tidak ada dokumen</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{ $documents->links() }}
    </div>
</div>
@endsection
