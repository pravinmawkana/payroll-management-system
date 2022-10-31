<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblemployeedetailsModel extends Model
{
    use HasFactory;
    protected $table = "employeemaster";
    protected $primaryKey = "empId";
    public function departmentmaster()
    {
        return $this->hasMany(DepartmentMaster::class,'deptId');
    }
}
