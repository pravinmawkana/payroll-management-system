<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentNameMaster extends Model
{
    use HasFactory;
    protected $table = "component_name_masters";
    protected $primaryKey = "cNameId";
    protected $fillable=[
        'cTypeId',
        'cName',
        'calcCode',
        'status'
    ];
}
