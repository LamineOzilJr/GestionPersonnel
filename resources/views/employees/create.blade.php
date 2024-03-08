@extends('layouts.app')

@section('content')
    <h1>Ajouter un employé</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone:</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>
        <div class="form-group">
            <label for="carte_identite">CNI:</label>
            <input type="text" class="form-control" id="carte_identite" name="carte_identite" required>
        </div>
        <div class="form-group">
            <label for="horaires_travail">Horaires:</label>
            <input type="text" class="form-control" id="horaires_travail" name="horaires_travail" required>
        </div>
        <div class="form-group">
            <label for="adresse_email">Email:</label>
            <input type="text" class="form-control" id="adresse_email" name="adresse_email" required>
        </div>
        <div class="form-group">
            <label for="qr_code_unique">Code:</label>
            <input type="text" class="form-control" id="qr_code_unique" name="qr_code_unique" required>
        </div>
        <div class="form-group">
            <label for="cout_journalier_moyen">Cout-Journalier:</label>
            <input type="text" class="form-control" id="cout_journalier_moyen" name="cout_journalier_moyen" required>
        </div>
        <!-- Ajoutez les autres champs du formulaire -->
        <style>
            .btn-primary {
                color: #000; 
            }
        </style>
        <button type="submit" class="btn btn-primary">Ajouter l'employé</button>
    </form>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Retour à la liste des employés</a>
@endsection
