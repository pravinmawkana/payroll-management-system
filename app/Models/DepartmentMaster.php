<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentMaster extends Model
{
    use HasFactory;
    protected $table = "departmentmaster";
    protected $primaryKey = "deptId";
    protected $fillable=[
        'deptName',
        'companyId',
        'status'
    ];
    public function department(){
        return $this->belongsTo(TblemployeedetailsModel::class)
    }
}
