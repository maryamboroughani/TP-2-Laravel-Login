@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload Document</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title_fr" class="form-label">Title (French)</label>
            <input type="text" id="title_fr" name="title_fr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="title_en" class="form-label">Title (English)</label>
            <input type="text" id="title_en" name="title_en" class="form-control">
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Document</label>
            <input type="file" id="file" name="file" class="form-control" accept=".pdf,.zip,.doc,.docx" required>
        </div>

        <button type="submit" class="btn btn-success">@lang('Téléverseur')</button>
    </form>
</div>
@endsection
