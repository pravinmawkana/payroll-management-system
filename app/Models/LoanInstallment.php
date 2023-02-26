<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInstallment extends Model
{
    use HasFactory;
    protected $table = "loan_installments";
    protected $primaryKey = "id";
    protected $fillable=[
        'loanId', 'empId', 'companyId', 'sMonthId', 'installment_date', 'installment_amount', 'remarks', 'loan_ded_code', 'status'
    ];
}
