@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-header mb-4">
    <h1>Dashboard</h1>
    <p class="text-muted">Selamat datang, {{ Auth::user()->name ?? 'User' }}</p>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card text-center">
            <div class="stats-icon mx-auto mb-2"><i class="bx bx-file"></i></div>
            <div class="stats-info">
                <div class="fw-bold">Total Dokumen</div>
                <div class="stats-number fs-4">{{ $totalDocuments ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card text-center">
            <div class="stats-icon mx-auto mb-2"><i class="bx bx-data"></i></div>
            <div class="stats-info">
                <div class="fw-bold">Total Size</div>
                <div class="stats-number fs-4">{{ number_format(($totalSize ?? 0) / 1048576, 2) }} MB</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card text-center">
            <div class="stats-icon mx-auto mb-2"><i class="bx bx-category"></i></div>
            <div class="stats-info">
                <div class="fw-bold">Total Kategori</div>
                <div class="stats-number fs-4">{{ $totalCategories ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="stats-card text-center">
            <div class="stats-icon mx-auto mb-2"><i class="bx bx-plus-circle"></i></div>
            <div class="stats-info">
                <div class="fw-bold">Tambah Arsip</div>
                <a href="{{ route('documents.create') }}" class="btn btn-primary btn-sm mt-2">Upload</a>
            </div>
        </div>
    </div>
</div>

<!-- Monthly Statistics -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Statistik Upload Dokumen {{ date('Y') }}</h5>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Document List -->
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Dokumen Terbaru</h5>
                <a href="{{ route('documents.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentDocuments ?? [] as $index => $doc)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $doc->title ?? '-' }}</td>
                                <td>
                                    @if(isset($doc->category))
                                        <span class="badge bg-info">{{ $doc->category->name }}</span>
                                    @else
                                        <span class="badge bg-secondary">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($doc->document_date))
                                        {{ $doc->document_date->format('d/m/Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ ($doc->status ?? 'arsip') == 'aktif' ? 'success' : 'secondary' }}">
                                        {{ ucfirst($doc->status ?? 'Arsip') }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada dokumen</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Kategori</h5>
            </div>
            <div class="card-body">
                <div class="category-list">
                    @forelse($categories ?? [] as $cat)
                    <a href="{{ route('documents.index', ['category' => $cat->id]) }}" class="category-item">
                        <i class="bx bx-folder"></i>
                        <span>{{ $cat->name ?? '-' }}</span>
                        <span class="badge bg-primary rounded-pill ms-auto">{{ $cat->documents_count ?? 0 }}</span>
                    </a>
                    @empty
                    <p class="text-muted text-center">Belum ada kategori</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyChart');
    if (!ctx) return;
    
    const monthlyData = @json($monthlyStats ?? []);
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    const data = new Array(12).fill(0);

    if (Array.isArray(monthlyData)) {
        monthlyData.forEach(item => {
            if (item && item.month && item.count) {
                data[item.month - 1] = item.count;
            }
        });
    }

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Jumlah Upload',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endpush