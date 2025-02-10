<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $table = 'borrower'; // Ensure this matches your actual table name
    protected $primaryKey = 'borrowID'; // Ensure this matches the primary key
    public $timestamps = false; 

    protected $fillable = ['borrowName', 'address', 'contact', 'email', 'tel'];

    public function payments()
    {
        return $this->hasMany(Payment::class, 'borrowerID', 'borrowID');
    }
}




