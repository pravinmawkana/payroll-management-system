<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthMaster extends Model
{
    use HasFactory;
    protected $table = "tbl_set_month";
    protected $primaryKey = "sMonthId";
    protected $fillable=[
         'companyId', 'startDate', 'endDate', 'mDays', 'month', 'year', 'monthDesc', 'lockStatus', 'showInESS', 'status'
    ];
}
