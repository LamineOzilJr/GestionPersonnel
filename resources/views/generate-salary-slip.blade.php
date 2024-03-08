<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulletin de salaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        p {
            margin-bottom: 0.5rem;
        }

        footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Bulletin de Salaire</h1>

        <div class="row mt-4">
            <div class="col-md-6">
                <p><strong>Nom de l'employé:</strong> {{ $employee->prenom }} {{ $employee->nom }}</p>
                <p><strong>Carte d'identité:</strong> {{ $employee->carte_identite }}</p>
                <p><strong>Téléphone:</strong> {{ $employee->telephone }}</p>
                <p><strong>Adresse email:</strong> {{ $employee->adresse_email }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Horaires de travail:</strong> {{ $employee->horaires_travail }}</p>
                <p><strong>QR Code unique:</strong> {{ $employee->qr_code_unique }}</p>
                <p><strong>Cout journalier moyen:</strong> {{ $employee->cout_journalier_moyen }} FCFA</p>
            </div>
        </div>
        
        <!-- Ajoutez d'autres détails du bulletin de salaire ici -->

        <footer class="mt-4">
            <p><strong>Date:</strong> {{ now()->format('d/m/Y') }}</p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
