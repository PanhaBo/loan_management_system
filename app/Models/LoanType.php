<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model {
    use HasFactory;

    protected $table = 'loan_type';
    protected $primaryKey = 'loanTypeID';
    protected $fillable = ['loanTypeName', 'Description'];
    public $timestamps = false;

    public function loanLists()
    {
        return $this->hasMany(LoanList::class, 'loanTypeID', 'loanTypeID');
    }
}