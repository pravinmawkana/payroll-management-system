<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlabMaster extends Model
{
    use HasFactory;
    protected $table = "slabmaster";
    protected $primaryKey = "slabId";
    protected $fillable=[
        'slabName',
        'companyId',
        'status'
    ];
}
