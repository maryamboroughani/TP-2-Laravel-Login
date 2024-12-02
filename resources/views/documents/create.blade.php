@extends('layouts.app')

@section('content')
    <h1>Upload Document</h1>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title_fr" class="form-label">Title (French)</label>
            <input type="text" class="form-control" id="title_fr" name="title_fr" required>
        </div>
        <div class="mb-3">
            <label for="title_en" class="form-label">Title (English)</label>
            <input type="text" class="form-control" id="title_en" name="title_en" required>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
@endsection
