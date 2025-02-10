<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanPlan;

class LoanPlanController extends Controller
{
    public function index()
    {
        $loan_plans = LoanPlan::all();
        return view('loan_system.loan_plan.index', compact('loan_plans'));
    }

    public function create()
    {
        return view('loan_system.loan_plan.create');
    }

    public function store(Request $request)
    {
        LoanPlan::create([
            'loanPlanName' => $request->loanPlanName,
            'Interest' => $request->Interest,
            'Penalty' => $request->Penalty,
            'duration' => $request->duration
        ]);

        return redirect()->route('loan_plan.index')->with('success', 'Loan plan created successfully.');
    }

    public function edit($id)
    {
        $loan_plan = LoanPlan::findOrFail($id);
        return view('loan_system.loan_plan.edit', compact('loan_plan'));
    }

    public function update(Request $request, $id)
    {
        $loanPlan = LoanPlan::findOrFail($id);
        $loanPlan->update([
            'loanPlanName' => $request->loanPlanName,
            'Interest' => $request->Interest,
            'Penalty' => $request->Penalty,
            'duration' => $request->duration
        ]);

        return redirect()->route('loan_plan.index')->with('success', 'Loan plan updated successfully.');
    }

    public function destroy($id)
    {
        LoanPlan::findOrFail($id)->delete();
        return redirect()->route('loan_plan.index')->with('success', 'Loan Plan deleted successfully.');
    }
}
