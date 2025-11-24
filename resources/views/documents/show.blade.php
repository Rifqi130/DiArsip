@extends('layouts.app')

@section('title', 'Detail Dokumen')

@section('content')
<div class="page-header mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Detail Dokumen</h1>
        <a href="{{ route('documents.index') }}" class="btn btn-secondary">
            <i class="bx bx-arrow-back"></i> Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Informasi Dokumen</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">Nomor Dokumen</th>
                            <td>: <code>{{ $document->document_number }}</code></td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>: {{ $document->title }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>: <span class="badge bg-info">{{ $document->category->name ?? '-' }}</span></td>
                        </tr>
                        <tr>
                            <th>Tanggal Dokumen</th>
                            <td>: {{ $document->document_date->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>: 
                                <span class="badge bg-{{ $document->status == 'aktif' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($document->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Diupload Oleh</th>
                            <td>: {{ $document->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Upload</th>
                            <td>: {{ $document->created_at->format('d F Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diubah</th>
                            <td>: {{ $document->updated_at->format('d F Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>: {{ $document->description ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- File Preview -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Preview Dokumen</h5>
            </div>
            <div class="card-body">
                @if(in_array($document->file_type, ['jpg', 'jpeg', 'png', 'gif']))
                    <img src="{{ Storage::url($document->file_path) }}" 
                         alt="{{ $document->title }}" 
                         class="img-fluid rounded">
                @elseif($document->file_type == 'pdf')
                    <div class="ratio ratio-16x9">
                        <iframe src="{{ Storage::url($document->file_path) }}" 
                                title="{{ $document->title }}"></iframe>
                    </div>
                @else
                    <div class="alert alert-info">
                        <i class="bx bx-info-circle"></i>
                        Preview tidak tersedia untuk tipe file ini. Silakan download untuk melihat dokumen.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <!-- File Info -->
        <div class="card mb-4">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Informasi File</h5>
            </div>
            <div class="card-body">
                <div class="mb-3 text-center">
                    <i class="bx bxs-file fs-1 text-primary"></i>
                </div>
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <th>Nama File</th>
                        </tr>
                        <tr>
                            <td class="text-muted small">{{ basename($document->file_path) }}</td>
                        </tr>
                        <tr>
                            <th>Tipe File</th>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge bg-secondary">{{ strtoupper($document->file_type) }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Ukuran File</th>
                        </tr>
                        <tr>
                            <td class="text-muted">{{ $document->file_size_formatted }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Actions -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="card-title mb-0">Aksi</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('documents.download', $document) }}" 
                       class="btn btn-primary">
                        <i class="bx bx-download"></i> Download Dokumen
                    </a>
                    
                    <a href="{{ route('documents.export-pdf', $document) }}" 
                       class="btn btn-danger">
                        <i class="bx bxs-file-pdf"></i> Export ke PDF (Laporan)
                    </a>
                    
                    <a href="{{ route('documents.edit', $document) }}" 
                       class="btn btn-warning">
                        <i class="bx bx-edit"></i> Edit Dokumen
                    </a>
                    
                    <form action="{{ route('documents.destroy', $document) }}" 
                          method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="bx bx-trash"></i> Hapus Dokumen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
