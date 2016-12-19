<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DataModel;

class ItemsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DataModel $model)
    {
        $this->model = $model;
        //
    }

    public function add(){
        return view('html.items');
    }

    public function itemsSave(Request $request){

        $id = DB::table('items')->insertGetId(
            $request->all()
        );
        return redirect('items');
    }

    //
}
