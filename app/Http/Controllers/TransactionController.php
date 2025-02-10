<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function Transaction()
    {
        return view('loan_system/transaction'); 
    }
}
