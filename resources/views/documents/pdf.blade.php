<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Dokumen - {{ $document->document_number }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px solid #333; padding-bottom: 20px; }
        .header h1 { margin: 0; font-size: 18px; text-transform: uppercase; }
        .header p { margin: 5px 0 0 0; font-size: 10px; color: #666; }
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .info-table td { padding: 8px; border: 1px solid #ddd; }
        .info-table td:first-child { width: 200px; font-weight: bold; background-color: #f5f5f5; }
        .section-title { font-size: 14px; font-weight: bold; margin: 20px 0 10px 0; padding: 10px; background-color: #f0f0f0; border-left: 4px solid #333; }
        .description { padding: 10px; border: 1px solid #ddd; background-color: #fafafa; min-height: 80px; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd; text-align: right; }
        .signature { margin-top: 60px; text-align: center; }
        .signature-line { border-top: 1px solid #333; width: 200px; margin: 0 auto; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Laporan Dokumen Arsip</h1>
        <p>Sistem Pengelolaan Arsip Digital - DiArsip</p>
    </div>

    <div class="section-title">Informasi Dokumen</div>
    <table class="info-table">
        <tr>
            <td>Nomor Dokumen</td>
            <td>{{ $document->document_number }}</td>
        </tr>
        <tr>
            <td>Judul Dokumen</td>
            <td>{{ $document->title }}</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>{{ $document->category->name ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tanggal Dokumen</td>
            <td>{{ $document->document_date->format('d F Y') }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ ucfirst($document->status) }}</td>
        </tr>
    </table>

    <div class="section-title">Deskripsi</div>
    <div class="description">
        {{ $document->description ?? 'Tidak ada deskripsi' }}
    </div>

    <div class="section-title">Informasi File</div>
    <table class="info-table">
        <tr>
            <td>Nama File</td>
            <td>{{ basename($document->file_path) }}</td>
        </tr>
        <tr>
            <td>Tipe File</td>
            <td>{{ strtoupper($document->file_type) }}</td>
        </tr>
        <tr>
            <td>Ukuran File</td>
            <td>{{ $document->file_size_formatted }}</td>
        </tr>
    </table>

    <div class="section-title">Informasi Upload</div>
    <table class="info-table">
        <tr>
            <td>Diupload Oleh</td>
            <td>{{ $document->user->name ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tanggal Upload</td>
            <td>{{ $document->created_at->format('d F Y H:i') }}</td>
        </tr>
        <tr>
            <td>Terakhir Diubah</td>
            <td>{{ $document->updated_at->format('d F Y H:i') }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d F Y H:i') }}</p>
        <div class="signature">
            <p>Mengetahui,</p>
            <br><br><br>
            <div class="signature-line"></div>
            <p>Kepala Bagian Arsip</p>
        </div>
    </div>
</body>
</html>
