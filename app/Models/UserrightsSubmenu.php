<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserrightsSubmenu extends Model
{
    use HasFactory;
    protected $table = "tbluserrightssubmenu";
    protected $primaryKey = "urSubMenuId";
}
