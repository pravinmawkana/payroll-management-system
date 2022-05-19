<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;
    protected $table = "tblmainmenu";
    protected $primaryKey = "mainMenuId";
    public function getMainmenu($mainMenuId){
        return MainMenu::where('mainMenuId','=',$mainMenuId);
    }

}
