<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Borrower;
use Illuminate\Database\QueryException;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('borrower')->get();
        return view('loan_system.payments.index', compact('payments'));

    }


    public function create()
    {
        $borrowers = Borrower::all();
        return view('loan_system.payments.create', compact('borrowers'));
    }
    
    public function store(Request $request)
    {
    
        // Validate the request
        $validatedData = $request->validate([
            'borrowerID' => 'required|exists:borrower,borrowID',
            'amount' => 'required|numeric|min:0.01',
            'paymentDate' => 'required|date', // Ensure paymentDate is validated
        ]);
    
        // Create a new Payment
        Payment::create($validatedData);
    
        return redirect()->route('payments.index')->with('success', 'Payment added successfully!');
    }
    
    
      
    
    public function edit(Payment $payment)
    {
        $borrowers = Borrower::all(); // ✅ Ensure Borrower model is correct
        return view('loan_system.payments.edit', compact('payment', 'borrowers'));
    }
    

    // public function update(Request $request, Payment $payment)
    // {
    //     $request->validate([
    //         'borrowerID' => 'required|exists:borrowers,borrowID',
    //         'amount' => 'required|numeric|min:0.01',
    //         'paymentDate' => 'required|date',
    //     ]);
    
    //     $payment->update($request->all());
    
    //     return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    // }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update([
            'borrowerID' => $request->borrowerID,
            'amount' => $request->amount,
            'paymentDate' => $request->paymentDate,
        ]);

        return redirect()->route('payments.index')->with('success', 'Loan plan updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }
}
