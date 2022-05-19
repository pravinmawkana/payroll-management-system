<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentTypeMaster extends Model
{
    use HasFactory;
    protected $table = "component_type_masters";
    protected $primaryKey = "cTypeId";
    protected $fillable=[
        'cTypeName',
        'cTypeDesc',
        'status'
    ];
}
