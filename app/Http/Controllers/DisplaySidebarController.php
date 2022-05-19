<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenu;
use App\Models\SubMenu;
use App\Models\UserrightsMainmenu;
use App\Models\UserrightsSubmenu;

class DisplaySidebarController extends Controller
{
    public static function index(){
        $mainMenu = MainMenu::where('mainMenuId','=',6)->get(); //where('empId', '=', session('userid'))->get();
        //echo "<pre>";
        //print_r($mainMenu);
        // foreach ($mainMenu as $key => $value) {
        //     echo $value['mmName'] ."</br>";
        // }

        //$userRightsMainmenu = ;
        // foreach ($userRightsMainmenu as $key => $value) {
            foreach ( MainMenu::whereIn('mainMenuId',UserrightsMainmenu::where('empId', '=', session('userid'))->get(['mainMenuId']))->get() as $key => $value){
                echo '<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="'.$value['mmIcon'].'"></span><span class="mtext">'.$value['mmName'].'</span>
						</a>';
               DisplaySidebarController::getSubMenu($value['mainMenuId']);
               echo '</li>';
            }
       // }
        // $subMenu = SubMenu::where('mainMenuId', '=', 2)->get();
        // //$data = '';
        // //print_r($subMenu);
        // foreach ($subMenu as $key => $value) {
        //     echo $value['subMenuPage'].'</br>';
        // }
    }
    public static  function getSubMenu($mainMenuId){
        $subMenu = SubMenu::where('mainMenuId', '=', $mainMenuId)->whereIn('subMenuId',UserrightsSubmenu::where('empId', '=', session('userid'))->get(['subMenuId']))->get();
        //$data = '';
        foreach ($subMenu as $key => $value) {
            echo '<ul class="submenu">
							<li><a href="'.$value['subMenuPage'].'">'.$value['subMenuName'].'</a></li>
						</ul>';
        }
       // echo $data;
    }

}
