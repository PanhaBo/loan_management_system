<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function Loan()
    {
        return view('loan_system/loan'); 
    }
}
