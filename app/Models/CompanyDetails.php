<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    use HasFactory;
    protected $table = "companydetails";
    protected $primaryKey = "companyId";
    protected $fillable = ['companyCode','companyName','address1','address2','city','state','pinCode','country','panNo','contactNo1','contactNo2','emailId','website','pfRegistrationNo','esicRegistrationNo','localOffice','reginalOffice','subAccountOffice','principalEmployeer','principalDesignation','pfGroup','status'];
}
