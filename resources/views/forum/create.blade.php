@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Create Article</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf

        <!-- Title in French -->
        <div class="mb-3">
            <label for="title_fr" class="form-label">Titre (Français)</label>
            <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ old('title_fr') }}" required>
        </div>

        <!-- Title in English -->
        <div class="mb-3">
            <label for="title_en" class="form-label">Title (English)</label>
            <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}" required>
        </div>

        <!-- Content in French -->
        <div class="mb-3">
            <label for="content_fr" class="form-label">Contenu (Français)</label>
            <textarea class="form-control" id="content_fr" name="content_fr" rows="4">{{ old('content_fr') }}</textarea>
        </div>

        <!-- Content in English -->
        <div class="mb-3">
            <label for="content_en" class="form-label">Content (English)</label>
            <textarea class="form-control" id="content_en" name="content_en" rows="4">{{ old('content_en') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>
@endsection
