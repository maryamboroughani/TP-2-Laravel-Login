<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,zip,doc|max:2048',
        ]);

        $filePath = $request->file('file')->store('documents');

        Document::create([
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('documents.index')->withSuccess('Document uploaded successfully.');
    }

    public function edit(Document $document)
    {
        $this->authorize('update', $document);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $this->authorize('update', $document);

        $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,zip,doc|max:2048',
        ]);

        if ($request->hasFile('file')) {
            Storage::delete($document->file_path);
            $filePath = $request->file('file')->store('documents');
            $document->file_path = $filePath;
        }

        $document->update($request->only(['title_fr', 'title_en']));

        return redirect()->route('documents.index')->withSuccess('Document updated successfully.');
    }

    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);

        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->withSuccess('Document deleted successfully.');
    }
}
