<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMaster extends Model
{
    use HasFactory;
    protected $table = "categorymaster";
    protected $primaryKey = "catgId";
    protected $fillable=[
        'catgName',
        'companyId',
        'status'
    ];
}
