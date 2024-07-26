<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTask extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jobtask) {
            $jobtask->fk_transporter_user = auth()->id() ?? null; //relationship
        });
    }

    // Define the relationship
    public function transporterUser()
    {
        return $this->belongsTo(User::class, 'fk_transporter_user');
    }

    // Accessor for the fk_transporter_user column
    public function getFkTransporterUserNameAttribute()
    {
        return optional($this->transporterUser)->name;
    }
}
