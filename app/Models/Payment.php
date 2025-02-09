<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments'; // Ensure the table name is correct
    protected $primaryKey = 'paymentID';
    protected $fillable = ['borrowerID', 'amount', 'paymentDate'];
    public $timestamps = false;

    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrowerID', 'borrowID');
    }
}



