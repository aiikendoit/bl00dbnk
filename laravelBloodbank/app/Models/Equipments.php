<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'brand',
    //     'model',
    //     'fk_createdBy_user',
    //     // ... other fields ...
    // ];

    // protected $attributes = [
    //     'fk_createdBy_user' => null, // Set the default value to null
    // ];


    protected $guarded = [];

    // Define a boot method to register the event listener
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($equipment) {
            $equipment->fk_createdBy_user = auth()->id() ?? null; //relationship
        });
    }
    
    // Define the relationship
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'fk_createdBy_user');
    }

    // Accessor for the fk_createdBy_user column
    public function getFkCreatedByUserNameAttribute()
    {
        return optional($this->createdByUser)->name;
    }
}
