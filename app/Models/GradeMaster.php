<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeMaster extends Model
{
    use HasFactory;
    protected $table = "grademaster";
    protected $primaryKey = "gradeId";
    protected $fillable=[
        'gradeName',
        'companyId',
        'status'
    ];
}
