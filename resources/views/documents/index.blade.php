@extends('layouts.app')

@section('content')
    <h1>Documents</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Uploaded By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>{{ app()->getLocale() === 'fr' ? $document->title_fr : $document->title_en }}</td>
                    <td>{{ $document->user->name }}</td>
                    <td>
                        <a href="{{ Storage::url($document->file_path) }}" target="_blank" class="btn btn-info">View</a>
                        @can('update', $document)
                            <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning">Edit</a>
                        @endcan
                        @can('delete', $document)
                            <form action="{{ route('documents.destroy', $document) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $documents->links() }}
@endsection
