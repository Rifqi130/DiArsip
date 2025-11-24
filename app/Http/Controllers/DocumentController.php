<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocumentsExport;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = Document::with(['category', 'user']);

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('document_number', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('document_date', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('document_date', '<=', $request->date_to);
        }

        $documents = $query->latest()->paginate(10);
        $categories = Category::all();

        return view('documents.index', compact('documents', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('documents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'document_number' => 'required|string|unique:documents',
            'category_id' => 'required|exists:categories,id',
            'document_date' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'status' => 'required|in:aktif,arsip,dihapus',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documents', $filename, 'public');
        Document::create([
            'title' => $validated['title'],
            'document_number' => $validated['document_number'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
            'description' => $validated['description'],
            'file_path' => $path,
            'file_type' => $file->getClientOriginalExtension(),
            'file_size' => $file->getSize(),
            'document_date' => $validated['document_date'],
            'status' => $validated['status'],
        ]);


        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $categories = Category::all();
        return view('documents.edit', compact('document', 'categories'));
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'document_number' => 'required|string|unique:documents,document_number,' . $document->id,
            'category_id' => 'required|exists:categories,id',
            'document_date' => 'required|date',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
            'status' => 'required|in:aktif,arsip,dihapus',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($document->file_path);

            // Upload new file
            $file = $request->file('file');
            $filename = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('documents', $filename, 'public');

            $validated['file_path'] = $path;
            $validated['file_type'] = $file->getClientOriginalExtension();
            $validated['file_size'] = $file->getSize();
        }
        
        $validated['user_id'] = Auth::id();
        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diupdate');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus');
    }

    public function download(Document $document)
    {
        $filePath = Storage::disk('public')->path($document->file_path);
        return response()->download($filePath, $document->title . '.' . $document->file_type);
    }

    public function exportPdf(Document $document)
    {
        $pdf = Pdf::loadView('documents.pdf', compact('document'));
        return $pdf->download('Laporan_' . $document->document_number . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $filters = $request->only(['search', 'category', 'status']);
        return Excel::download(
            new DocumentsExport($filters), 
            'Data_Dokumen_' . date('Y-m-d_His') . '.xlsx'
        );
    }
}
