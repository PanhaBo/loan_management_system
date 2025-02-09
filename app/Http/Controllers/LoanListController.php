<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;
use App\Models\LoanList;
use App\Models\LoanPlan;
use App\Models\LoanType;
use App\Models\Payment;
use App\Models\Status;

class LoanListController extends Controller
{
    public function index()
    {
        $loanLists = LoanList::with(['borrower', 'loanPlan', 'loanType', 'status', 'payment'])->get();
    
        return view('loan_system.loan_list.index', compact('loanLists'));
    }
    
    public function create()
    {
        $borrowers = Borrower::all();
        $loanPlans = LoanPlan::all();
        $loanTypes = LoanType::all();
        $statuses = Status::all();
        $payments = Payment::all(); // Ensure this is included
    
        return view('loan_system.loan_list.create', compact('borrowers', 'loanPlans', 'loanTypes', 'statuses', 'payments'));
    }
    
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'borrowID' => 'required|exists:borrower,borrowID',
            'loanPlanID' => 'required|exists:loan_plan,loanPlanID',
            'loanTypeID' => 'required|exists:loan_type,loanTypeID',
            'statusID' => 'required|exists:status,statusID',
        ]);
    
        LoanList::create($validatedData);
    
        return redirect()->route('loan_list.index')->with('success', 'Loan added successfully!');
    }
    
    public function edit(LoanList $loan_list)
    {
        $borrowers = Borrower::all();
        $loanPlans = LoanPlan::all();
        $loanTypes = LoanType::all();
        $statuses = Status::all();
    
        return view('loan_system.loan_list.edit', compact('loan_list', 'borrowers', 'loanPlans', 'loanTypes', 'statuses'));
    }
    
    public function update(Request $request, LoanList $loan_list)
    {
        $validatedData = $request->validate([
            'borrowID' => 'required|exists:borrower,borrowID',
            'loanPlanID' => 'required|exists:loan_plan,loanPlanID',
            'loanTypeID' => 'required|exists:loan_type,loanTypeID',
            'statusID' => 'required|exists:status,statusID',
        ]);
    
        $loan_list->update($validatedData);
    
        return redirect()->route('loan_list.index')->with('success', 'Loan updated successfully!');
    }
    public function destroy($id)
    {
        try {
            $loan = LoanList::findOrFail($id); // Find the loan record
            $loan->delete(); // Delete it

            return redirect()->route('loan_list.index')->with('success', 'Loan record deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('loan_list.index')->with('error', 'Error deleting loan record.');
        }
    }

    
}
