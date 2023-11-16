<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = ['full_name', 'nic', 'dob', 'contact_number'];

    //Reverse relationship between application and applicant
    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'id');
    }
}
