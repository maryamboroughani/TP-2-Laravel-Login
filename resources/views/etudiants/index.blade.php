@extends('layouts.app')

@section('title', 'Liste des Étudiants')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Liste des Étudiants</h1>
    <a href="{{ route('etudiants.create') }}" class="btn btn-primary mb-3">Ajouter un Nouvel Étudiant</a>
    
    <div class="row">
        @foreach($etudiants as $etudiant)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $etudiant->nom }}</h5>
                        <p class="card-text"><strong>Adresse:</strong> {{ $etudiant->adresse }}</p>
                        <p class="card-text"><strong>Téléphone:</strong> {{ $etudiant->telephone }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $etudiant->email }}</p>
                        <p class="card-text"><strong>Date de Naissance:</strong> {{ $etudiant->date_de_naissance }}</p>
                        <p class="card-text"><strong>Ville:</strong> {{ $etudiant->ville->nom }}</p>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                            <a href="{{ route('articles.index', ['etudiant' => $etudiant->id]) }}" class="btn btn-info btn-sm">Forum</a>
                            <a href="{{ route('documents.create') }}" class="btn btn-sm btn-success">Upload Document</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
