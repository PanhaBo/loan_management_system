<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['borrower_name', 'amount', 'interest_rate', 'duration_months', 'status'];

    public function loanLists()
    {
        return $this->hasMany(LoanList::class, 'loanPlanID', 'loanPlanID');
    }
}
