@extends('layouts.app')

@section('title', 'Edit Document')

@section('content')
<div class="container">
    <h1>Edit Document</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- French Title -->
        <div class="mb-3">
            <label for="title_fr" class="form-label">Title (French)</label>
            <input type="text" name="title_fr" id="title_fr" class="form-control" value="{{ old('title_fr', $document->title_fr) }}" required>
        </div>

        <!-- English Title -->
        <div class="mb-3">
            <label for="title_en" class="form-label">Title (English)</label>
            <input type="text" name="title_en" id="title_en" class="form-control" value="{{ old('title_en', $document->title_en) }}">
        </div>

        <!-- File Upload (Optional) -->
        <div class="mb-3">
            <label for="file" class="form-label">Replace File (Optional)</label>
            <input type="file" name="file" id="file" class="form-control" accept=".pdf,.zip,.doc,.docx">
        </div>

        <button type="submit" class="btn btn-primary">Update Document</button>
    </form>
</div>
@endsection
