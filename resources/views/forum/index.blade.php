@extends('layouts.app')

@section('title', 'Forum')

@section('content')
<div class="container">
    <h1>Articles</h1>

    <!-- Show "Add Article" button only if the logged-in user is viewing their own section -->
    @if (auth()->check() && request()->input('etudiant') == auth()->user()->etudiant_id)
        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Ajouter un Article</a>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Auteur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->title_fr ?? $article->title_en }}</td>
                    <td>{{ $article->content_fr ?? $article->content_en }}</td>
                    <td>{{ $article->user->name ?? 'Unknown' }}</td>
                    <td>
                        <!-- Show "Edit" and "Delete" buttons only for the article's author -->
                        @if (auth()->check() && request()->input('etudiant') == auth()->user()->etudiant_id)
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-primary">Modifier</a>
                            
                            <!-- Delete Button -->
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this article? This action cannot be undone.');">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $articles->links() }}
</div>
@endsection

