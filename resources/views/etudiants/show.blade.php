@extends('layouts.app')

@section('title', 'Détails de l\'Étudiant')

@section('content')
<div class="container">
    <h1 class="my-4">Détails de l'Étudiant</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nom:</strong> {{ $etudiant->nom }}</li>
        <li class="list-group-item"><strong>Adresse:</strong> {{ $etudiant->adresse }}</li>
        <li class="list-group-item"><strong>Téléphone:</strong> {{ $etudiant->telephone }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $etudiant->email }}</li>
        <li class="list-group-item"><strong>Date de Naissance:</strong> {{ $etudiant->date_de_naissance }}</li>
        <li class="list-group-item"><strong>Ville:</strong> {{ $etudiant->ville->nom }}</li>
    </ul>
    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning mt-3">Modifier</a>
    
    <!-- Bouton pour déclencher la modal de suppression -->
    <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteEtudiantModal">
        Supprimer
    </button>
</div>

<!-- Modal de Confirmation de Suppression -->
<div class="modal fade" id="deleteEtudiantModal" tabindex="-1" aria-labelledby="deleteEtudiantLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEtudiantLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer le dossier de {{ $etudiant->nom }} ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
