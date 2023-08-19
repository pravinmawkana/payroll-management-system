<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exceldata extends Model
{
    use HasFactory;
    protected $table = "exceldatas";
    protected $primaryKey = "id";
    protected $fillable = [
        'empId',
        'excel_filename',
        'excel_data'
    ];
}
