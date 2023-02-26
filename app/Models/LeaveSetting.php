<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveSetting extends Model
{
    use HasFactory;
    protected $table = "leave_settings";
    protected $primaryKey = "leaveSettingId";
    protected $fillable=[
       'gradeId', 'companyId', 'pl_cf', 'pl_ae', 'pl_cfl', 'pl_ycredit', 'pl_prorata', 'sl_cf', 'sl_ae', 'sl_cfl', 'sl_ycredit', 'sl_prorata', 'cl_cf', 'cl_ae', 'cl_cfl', 'cl_ycrsedit', 'cl_prorata', 'co_cf', 'co_ae', 'co_cfl', 'co_ycredit', 'co_prorata', 'ol1_cf', 'ol1_ae', 'ol1_cfl', 'ol1_ycredit', 'ol1_prorata', 'ol2_cf', 'ol2_ae', 'ol2_cfl', 'ol2_ycredit', 'ol2_prorata', 'ol3_cf', 'ol3_ae', 'ol3_cfl', 'ol3_ycredit', 'ol3_prorata', 'ol4_cf', 'ol4_ae', 'ol4_cfl', 'ol4_ycredit', 'ol4_prorata', 'pl_avail_after', 'sl_avail_after', 'cl_avail_after', 'co_avail_after', 'ol1_avail_after', 'ol2_avail_after', 'ol3_avail_after', 'ol4_avail_after', 'pl_credit_days', 'sl_credit_days', 'cl_credit_days', 'co_credit_days', 'ol1_credit_days', 'ol2_credit_days', 'ol3_credit_days', 'ol4_credit_days', 'calculate_on', 'status'
    ];
}
