<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Dompdf\Dompdf;
use Dompdf\Options;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'carte_identite' => 'required',
            'horaires_travail' => 'required',
            'adresse_email' => 'required|email',
            'qr_code_unique' => 'required|unique:employees',
            'cout_journalier_moyen' => 'required|numeric',
        ]);

        Employee::create($request->all());

        return redirect('/employees')->with('success', 'Employee ajouté avec succès.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'carte_identite' => 'required',
            'horaires_travail' => 'required',
            'adresse_email' => 'required|email',
            'qr_code_unique' => 'required|unique:employees,qr_code_unique,' . $employee->id,
            'cout_journalier_moyen' => 'required|numeric',
        ]);

        $employee->update($request->all());

        return redirect('/employees')->with('success', 'Employee mis à jour avec succès.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee supprimé avec succès.');
    }

  
    public function generateSalarySlip(Employee $employee)
    {
        // Configuration de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
    
        $dompdf = new Dompdf($options);
    
        // Vue Blade pour le contenu du PDF
        $viewData = [
            'employee' => $employee,
            // Ajoutez d'autres données nécessaires à la vue ici
        ];
    
        $html = view ('generate-salary-slip', $viewData)->render();
    
        // Charge le HTML dans Dompdf
        $dompdf->loadHtml($html);
    
        // Définir la taille du papier
        $dompdf->setPaper('A4', 'portrait');
    
        // Rendu du PDF
        $dompdf->render();
    
        // Retourne la réponse avec le PDF en streaming
        return response()->stream(
            function () use ($dompdf) {
                echo $dompdf->output();
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $employee->nom . '_bulletin_salaire.pdf"',
            ]
        );
    }
    
}
