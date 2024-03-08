<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'carte_identite',
        'horaires_travail',
        'adresse_email',
        'qr_code_unique',
        'cout_journalier_moyen',
    ];
}
