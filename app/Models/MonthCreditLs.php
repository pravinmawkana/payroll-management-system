<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthCreditLs extends Model
{
    use HasFactory;
    protected $table = "month_credit_ls";
    protected $primaryKey = "id";
    protected $fillable=[
       'leaveSettingId', 'companyId', 'leave_setting_header', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'status'
    ];
}
