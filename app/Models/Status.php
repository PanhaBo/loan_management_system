<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status'; // Ensure this matches your database table name
    protected $primaryKey = 'statusID'; // Define primary key
    public $timestamps = false; // Disable timestamps if not used

    protected $fillable = ['statusName'];

    // Define relationship with LoanList
    public function loanLists()
    {
        return $this->hasMany(LoanList::class, 'statusID', 'statusID');
    }
}
