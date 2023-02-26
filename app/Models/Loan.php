<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = "loans";
    protected $primaryKey = "loanId";
    protected $fillable=[
        'loanTypeId', 'empId', 'companyId', 'loan_date', 'amount_given', 'installment', 'start_recoery_month', 'start_recoery_year', 'hold_month', 'status'
    ];
}
