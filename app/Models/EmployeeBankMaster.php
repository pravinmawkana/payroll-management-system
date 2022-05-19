<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBankMaster extends Model
{
    use HasFactory;
    protected $table = "employeebankmaster";
    protected $primaryKey = "eBankId";
    protected $fillable=[
        'eBankName',
        'eBankIFSCCode',
        'eBankAddress',
        'companyId',
        'status'
    ];
}
