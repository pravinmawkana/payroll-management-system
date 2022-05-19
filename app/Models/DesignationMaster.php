<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationMaster extends Model
{
    use HasFactory;
    protected $table = "designationmaster";
    protected $primaryKey = "desigId";
    protected $fillable=[
        'desigName',
        'companyId',
        'status'
    ];
}
