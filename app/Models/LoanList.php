<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanList extends Model
{
    use HasFactory;

    protected $table = 'loan_list'; 
    protected $primaryKey = 'loanListID'; 
    public $timestamps = false;

    protected $fillable = ['borrowID', 'loanPlanID', 'loanTypeID', 'statusID'];

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrowID', 'borrowID');
    }

    public function loanPlan()
    {
        return $this->belongsTo(LoanPlan::class, 'loanPlanID', 'loanPlanID');
    }

    public function loanType()
    {
        return $this->belongsTo(LoanType::class, 'loanTypeID', 'loanTypeID');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'statusID', 'statusID');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'paymentID', 'paymentID');
    }
}
