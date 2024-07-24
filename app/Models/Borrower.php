<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrower extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'loan_id',
        'borrower_name',
        'borrower_email',
        'borrower_phone',
    ];

    public function loan() : BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }
}
