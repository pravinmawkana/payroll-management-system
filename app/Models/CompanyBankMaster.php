<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBankMaster extends Model
{
    use HasFactory;
    protected $table = "companybankmaster";
    protected $primaryKey = "bankId";
    protected $fillable=[
        'bankName',
        'accountNumber',
        'bsrCode',
        'micrCode',
        'ifscCode',
        'address',
        'contactPersonName',
        'contactPersonNo',
        'companyId',
        'status'
    ];
}
