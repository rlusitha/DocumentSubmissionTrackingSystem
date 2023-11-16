<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    use HasFactory;

    // Add Fillable attribute
    protected $fillable = ['application_date', 'disease_type', ];

    //Defining the relationship between Application and the Applicant
    public function applicant(): HasOne
    {
        return $this->hasOne(Applicant::class);
    }
}
