<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchMaster extends Model
{
    use HasFactory;
    protected $table = "branchmaster";
    protected $primaryKey = "branchId";
    protected $fillable=[
        'branchCode',
        'branchName',
        'address',
        'tanNo',
        'isPTApplicable',
        'ptRegNo',
        'ptLocalOfiice',
        'days',
        'companyId',
        'status'
    ];
}

