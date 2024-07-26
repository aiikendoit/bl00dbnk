<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'bgrh',
        'result',
        'user_id',
        'patient_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    

}
