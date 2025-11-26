@extends('layouts.app')

@section('title', 'Edit Dokumen')

@section('content')
<div class="page-header mb-4">
    <h1>Edit Dokumen</h1>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('documents.update', $document) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $document->title) }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="document_number" class="form-label">Nomor Dokumen <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('document_number') is-invalid @enderror" 
                               id="document_number" name="document_number" value="{{ old('document_number', $document->document_number) }}" required>
                        @error('document_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="upd" class="form-label">UPD</label>
                        <input type="text" class="form-control @error('upd') is-invalid @enderror" 
                               id="upd" name="upd" value="{{ old('upd', $document->upd) }}">
                        @error('upd')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select @error('category_id') is-invalid @enderror" 
                                id="category_id" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $document->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->parent ? $cat->parent->name . ' > ' : '' }}{{ $cat->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="document_date" class="form-label">Tanggal Dokumen <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('document_date') is-invalid @enderror" 
                               id="document_date" name="document_date" value="{{ old('document_date', $document->document_date->format('Y-m-d')) }}" required>
                        @error('document_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" 
                                id="status" name="status" required>
                            <option value="aktif" {{ old('status', $document->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="arsip" {{ old('status', $document->status) == 'arsip' ? 'selected' : '' }}>Arsip</option>
                        </select>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $document->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File Dokumen</label>
                <div class="alert alert-info" role="alert">
                    <i class="bx bx-info-circle"></i> <strong>File Saat Ini:</strong> {{ $document->file_path }} 
                    <br><small>Tipe: {{ strtoupper($document->file_type) }} | Ukuran: {{ $document->file_size_formatted }}</small>
                </div>
                <input type="file" class="form-control @error('file') is-invalid @enderror" 
                       id="file" name="file">
                <small class="text-muted">
                    Format: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG (Max: 10MB)<br>
                    <span class="text-danger">*</span>
                    Biarkan kosong jika tidak ingin mengubah file
                </small>
                @error('file')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-save"></i> Simpan
                </button>
                <a href="{{ route('documents.index') }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back"></i> Batal
                </a>
                <button type="button" class="btn btn-danger" onclick="if(confirm('Yakin ingin menghapus dokumen ini?')) { document.getElementById('deleteForm').submit(); }">
                    <i class="bx bx-trash"></i> Hapus
                </button>
            </div>
        </form>

        <!-- Delete Form -->
        <form id="deleteForm" action="{{ route('documents.destroy', $document) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

@endsection
