@extends('layout')

@section('title', 'Ajouter un Étudiant')

@section('content')
<div class="container">
    <h1 class="my-4">Ajouter un Nouvel Étudiant</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('etudiants.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>
        <div class="col-md-6">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
        </div>
        <div class="col-md-6">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="col-md-6">
            <label for="date_de_naissance" class="form-label">Date de Naissance</label>
            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ old('date_de_naissance') }}" required>
        </div>
        <div class="col-md-6">
            <label for="ville_id" class="form-label">Ville</label>
            <select class="form-select" id="ville_id" name="ville_id" required>
    <option value="">Sélectionnez une ville</option>
    @foreach($villes as $ville)

        <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>
            {{ $ville->nom }}
        </option>
    @endforeach
</select>


        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
@endsection
