<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patientIdNo',
        'lastname',
        'firstname',
        'middlename',
        'age',
        'gender',
        'user_id',


    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
{
    return "{$this->lastname}, {$this->firstname} {$this->middlename}";
}

}
