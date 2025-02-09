<?php

namespace App\Http\Controllers;

use App\Models\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller {
    public function index() {
        $loan_type = LoanType::all();
        return view('loan_system.loan_type.index', compact('loan_type'));
    }

    public function create() {
        return view('loan_system.loan_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'loanTypeName' => 'required|string|max:255',
            'Description' => 'nullable|string',
        ]);

        LoanType::create([
            'loanTypeName' => $request->loanTypeName,
            'Description' => $request->Description ?? '', // Ensure it's passed
        ]);

        return redirect()->route('loan_type.index')->with('success', 'Loan Type added successfully!');
    }

    public function edit($id)
    {
        $loan_type = LoanType::where('loanTypeID', $id)->firstOrFail(); // Fetch a single row
        return view('loan_system.loan_type.edit', compact('loan_type'));
    }

    public function update(Request $request, $id)
    {
        $loan_type = LoanType::findOrFail($id);
        $loan_type->update($request->all());
        return redirect()->route('loan_type.index')->with('success', 'Loan Type updated successfully!');
    }

    public function destroy(LoanType $loanType) {
        $loanType->delete();
        return redirect()->route('loan_type.index')->with('success', 'Loan Type deleted successfully!');
    }
}
