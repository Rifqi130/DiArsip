@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="page-header mb-4">
    <h1>Manajemen Kategori</h1>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Action Bar -->
<div class="card mb-4">
    <div class="card-body">
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Tambah Kategori Baru
        </a>
    </div>
</div>

<!-- Category Tree -->
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Struktur Kategori</h5>
    </div>
    <div class="card-body">
        <div class="list-group">
            @foreach($categories as $category)
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-1">
                            <i class="bx bx-folder text-primary"></i>
                            {{ $category->name }}
                        </h6>
                        <small class="text-muted">{{ $category->description }}</small>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="badge bg-info rounded-pill">{{ $category->documents->count() }} dokumen</span>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                <i class="bx bx-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                @if($category->children->count() > 0)
                <div class="ms-4 mt-2">
                    @foreach($category->children as $child)
                    <div class="list-group-item border-0 bg-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="bx bx-folder-minus text-secondary"></i>
                                {{ $child->name }}
                                <small class="text-muted">- {{ $child->description }}</small>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <span class="badge bg-secondary rounded-pill">{{ $child->documents->count() }}</span>
                                <a href="{{ route('categories.edit', $child) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $child) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Stats -->
<div class="row g-4 mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $totalCategories }}</h3>
                <p class="text-muted">Total Kategori Utama</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h3>{{ $totalSubCategories }}</h3>
                <p class="text-muted">Total Sub Kategori</p>
            </div>
        </div>
    </div>
</div>
@endsection
