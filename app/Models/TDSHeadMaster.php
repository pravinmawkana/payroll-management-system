<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDSHeadMaster extends Model
{
    use HasFactory;
    protected $table = "t_d_s_head_masters";
    protected $primaryKey = "tdsHeadId";
    protected $fillable=[
        'tdsHeadName',
        'tdsHeadDesc',
        'status'
    ];
}
