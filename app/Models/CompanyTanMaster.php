<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyTanMaster extends Model
{
    use HasFactory;
    protected $table = "companytanmaster";
    protected $primaryKey = "tanId";
    protected $fillable=[
        'tanNo',
        'tanRegisterAt',
        'tdsCircle',
        'decuctorType',
        'address1',
        'address2   ',
        'address3',
        'city',
        'pinCode',
        'state',
        'emailId1',
        'emailId2',
        'contact1',
        'contact2',
        'resonsiblePersonName',
        'resonsiblePersonPAN',
        'resonsiblePersonDesignation',
        'resonsiblePersonFName',
        'resonsiblePersonMobile',
        'resonsiblePersonContactNo1',
        'resonsiblePersonContactNo2',
        'resonsiblePersonemailId1',
        'resonsiblePersonemailId2',
        'companyId',
        'status'
    ];
}
