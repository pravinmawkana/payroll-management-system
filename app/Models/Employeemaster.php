<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeemaster extends Model
{
    use HasFactory;

    protected $table = 'employeemaster';
    protected $primaryKey = 'empId';
    public $timestamps = true;

    protected $fillable = [
        'empCode',
        'empTitle',
        'empFirstName',
        'empMiddleName',
        'empLastName',
        'spouseName',
        'gender',
        'dateOfBirth',
        'dateOfJoinning',
        'dateOfProbation',
        'dateOfConfirmation',
        'isPFApplicable',
        'pfNo',
        'pfApplyDate',
        'UNA',
        'isESICApplicable',
        'ESICNo',
        'isPTApplicable',
        'PAN',
        'branchId',
        'gradeId',
        'deptId',
        'desigId',
        'divId',
        'unitId',
        'projectId',
        'catgId',
        'paymentMode',
        'eBankId',
        'accountNo',
        'accountName',
        'adharNo',
        'reportingHeadId',
        'insertedBy',
        'updatedBy',
        'reportingManagerId',
        'groupJoiningDate',
        'dateOfLeaving',
        'reginRemarks',
        'isSalaryProcessing',
        'pfUNANo',
        'attendanceCode',
        'photoPath',
        'userName',
        'userPassword',
        'securityCode',
        'userRights',
        'lastLogOn',
        'ristriction',
        'ristrictSunday',
        'startTime',
        'endTime',
        'changePassStatus',
        'changePassDate',
        'financialYear',
        'companyId',
        'status'
    ];

    // Define relationships with other models here
    
    // Define any additional model methods or configurations here
}