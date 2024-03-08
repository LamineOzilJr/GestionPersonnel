@extends('layouts.app')

@section('content')
    <h1>Liste des employés</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>CNI</th>
                <th>Horaires</th>
                <th>Email</th>
                <th>Montants</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->nom }}</td>
                    <td>{{ $employee->prenom }}</td>
                    <td>{{ $employee->telephone }}</td>
                    <td>{{ $employee->carte_identite }}</td>
                    <td>{{ $employee->horaires_travail }}</td>
                    <td>{{ $employee->adresse_email }}</td>
                    <td>{{ $employee->cout_journalier_moyen }}</td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <style>
                                .btn-danger {
                                    color: #000; 
                                }
                            </style>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">Supprimer</button>
                        </form>
                        <a href="{{ route('employees.generate-salary-slip', $employee->id) }}" class="btn btn-success">Générer B.S</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Ajouter un employé</a>
@endsection
