<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    //
    public function __construct(){
        $this->checkout();
    }

    public function checkout(){
        if(empty($_SESSION['login'])){
            return redirect('login');
        }
    }
}
