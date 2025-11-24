<?php

namespace App\Exports;

use App\Models\Document;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;

class DocumentsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected array $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        $query = Document::with(['category', 'user']);

        // Apply filters if any
        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('document_number', 'like', "%{$search}%");
            });
        }

        if (!empty($this->filters['category'])) {
            $query->where('category_id', $this->filters['category']);
        }

        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        return $query->latest()->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nomor Dokumen',
            'Judul',
            'Kategori',
            'Tanggal Dokumen',
            'Status',
            'Deskripsi',
            'Tipe File',
            'Ukuran File',
            'Diupload Oleh',
            'Tanggal Upload'
        ];
    }

    /**
     * @param mixed $document
     * @return array
     */
    public function map($document): array
    {
        static $number = 0;
        $number++;

        return [
            $number,
            $document->document_number ?? '-',
            $document->title ?? '-',
            optional($document->category)->name ?? '-',
            $document->document_date ? $document->document_date->format('d/m/Y') : '-',
            ucfirst($document->status ?? 'arsip'),
            $document->description ?? '-',
            strtoupper($document->file_type ?? '-'),
            $document->file_size_formatted ?? '-',
            optional($document->user)->name ?? '-',
            $document->created_at ? $document->created_at->format('d/m/Y H:i') : '-'
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}
