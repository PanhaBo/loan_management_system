<?php

namespace App\Http\Controllers; // ✅ Make sure this is here

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    // Display all borrowers
    public function index()
    {
        $borrowers = Borrower::all();
        return view('loan_system.borrowers.index', compact('borrowers')); 
    }

    // Show edit form
    public function edit($id)
    {
        $borrower = Borrower::findOrFail($id);
        return view('loan_system.borrowers.edit', compact('borrower')); // ✅ Correct view path
    }

    // Update borrower
    public function update(Request $request, $id)
    {
        $borrower = Borrower::findOrFail($id);
        $borrower->update($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower updated successfully!');
    }

    // Delete borrower
    public function destroy($id)
    {
        Borrower::destroy($id);
        return redirect()->route('borrowers.index')->with('success', 'Borrower deleted successfully!');
    }

    public function create()
    {
        return view('loan_system.borrowers.create'); // Create a form view
    }

    public function store(Request $request)
    {
        Borrower::create($request->all());
        return redirect()->route('borrowers.index')->with('success', 'Borrower added successfully!');
    }

}
