<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPlan extends Model
{
    use HasFactory;

    protected $table = 'loan_plan';
    protected $primaryKey = 'loanPlanID';

    protected $fillable = ['loanPlanName', 'Interest', 'Penalty', 'duration'];
    public $timestamps = false;

    public function loanLists()
    {
        return $this->hasMany(LoanList::class, 'loanPlanID', 'loanPlanID');
    }
}
