<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactionIdNo',
        'patient_id',
        'bgrh',
        'amount',
        'transactionType',
        'transactionDate',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
