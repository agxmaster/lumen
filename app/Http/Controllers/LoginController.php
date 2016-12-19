<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DataModel;
use Laravel\Lumen\Routing\Controller as BaseController;

class LoginController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        session_start();
    }
   public function login(Request $request){
       return view('html.login',['status' => $request->get('status')]);
   }

    public function saveLogin(Request $request){

        $data = $request->all();
        if(empty($data['username']) || empty($data['password'])){
            return redirect('login?status=false');
        }elseif($data['username'] == 'zhanghuicheng' && $data['password'] == 'lixiaojun'){
            $_SESSION['login'] = 1;
            return redirect('storage');
        }else{
            return redirect('login?status=false');
        }
    }
    //

    public function loginout(){
        session_destroy();
        return redirect('login');
    }
}
