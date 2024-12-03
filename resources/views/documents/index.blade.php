@extends('layouts.app')

@section('title', 'Documents')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Uploaded Files</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title (FR)</th>
                <th>Title (EN)</th>
                <th>Uploader</th>
                <th>Date Uploaded</th>
                <th>File</th>
                @auth
                <th>Actions</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
                <tr>
                    <td>{{ $document->title_fr }}</td>
                    <td>{{ $document->title_en ?? '-' }}</td>
                    <td>{{ $document->user->name }}</td>
                    <td>{{ $document->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">View</a>
                    </td>
                    @auth
                    <td>
                        @if (auth()->id() === $document->user_id)
                            <a href="{{ route('documents.edit', $document) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        @endif
                    </td>
                    @endauth
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No files uploaded yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $documents->links() }}
</div>
@endsection
