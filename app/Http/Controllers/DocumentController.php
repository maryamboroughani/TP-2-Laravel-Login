<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')->paginate(10); // Paginate documents
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'title_fr' => 'required_without:title_en|string|max:255',
            'title_en' => 'required_without:title_fr|string|max:255',
            'file' => 'required|mimes:pdf,zip,doc,docx|max:2048',
        ]);
    
        // Store the uploaded file in the 'documents' directory
        $path = $request->file('file')->store('documents');
    
        // Create a new document record in the database
        Document::create([
            'title_fr' => $request->input('title_fr'),
            'title_en' => $request->input('title_en') ?? $request->input('title_fr'), // Fallback to 'title_fr' if 'title_en' is missing
            'file_path' => $path,
            'user_id' => auth()->id(),
        ]);
    
        // Redirect to the documents index with a success message
        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully!');
    }
    

    public function edit(Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403); // Only the uploader can edit
        }
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
        ]);

        $document->update($request->only('title_fr', 'title_en'));

        return redirect()->route('documents.index')->with('success', 'Document updated successfully!');
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        Storage::delete($document->file_path); // Delete the file
        $document->delete(); // Delete the record

        return redirect()->route('documents.index')->with('success', 'Document deleted successfully!');
    }
}
