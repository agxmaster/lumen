<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\DataModel;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DataModel $model)
    {
        parent::__construct();
        $this->model = $model;
        //
    }

    public function storage(){
        return view('html.storage',[
            'store' =>  config('database.store'),
            'items' =>  DB::table('items')->get()
        ]);
    }


    public function storageSave(Request $request){
        $subData = $request->all();
        $subData['type'] = 1;
        $subData['ddate'] = $subData['ddate'] ? $subData['ddate'] : date('Y-m-d H:i:s');
        $subData['num'] = abs($subData['num']);
//        print_r($subData);exit;
        $id = DB::table('store')->insertGetId(
            $subData
        );
        return redirect('list');
    }

    public function out(){
        return view('html.out',[
            'store' =>  config('database.store'),
            'items' =>  DB::table('items')->get()
        ]);
    }

    public function outSave(Request $request){
        $subData = $request->all();
        $subData['type'] = 2;
        $subData['ddate'] = $subData['ddate'] ? $subData['ddate'] : date('Y-m-d H:i:s');
        $subData['num'] = -abs($subData['num']);
//        print_r($subData);exit;
        $id = DB::table('store')->insertGetId(
            $subData
        );
        return redirect('list');
    }

    public function bad(){
        return view('html.bad',[
            'store' =>  config('database.store'),
            'items' =>  DB::table('items')->get()
        ]);
    }

    public function badSave(Request $request){
        $subData = $request->all();
        $subData['type'] = 3;
        $subData['ddate'] = $subData['ddate'] ? $subData['ddate'] : date('Y-m-d H:i:s');
        $subData['num'] = -abs($subData['num']);
        $id = DB::table('store')->insertGetId(
            $subData
        );
        return redirect('list');
    }

    public function storeList(Request $request){

        $requestData = $request->all();
        $s = '';
        if(empty($requestData['store'])) $requestData['store'] = 0;
        if(empty($requestData['type'])) $requestData['type'] = 0;
        if(empty($requestData['itemsid'])) $requestData['itemsid'] = 0;
        if(empty($requestData['bdate'])) $requestData['bdate'] = '';
        if(empty($requestData['cdate'])) $requestData['cdate'] = '';
        if(empty($requestData['page'])) $requestData['page'] = 1;

        if($requestData['store']){
            $s .= " and store.store = {$requestData['store']}";
        }
        if($requestData['type']){
            $s .= " and store.type = {$requestData['type']}";
        }
        if($requestData['itemsid']){
            $s .= " and store.itemsid = {$requestData['itemsid']}";
        }
        if($requestData['bdate']){
            $s .= " and store.ddate >= '{$requestData['bdate']}'";
        }
        if($requestData['cdate']){
            $s .= " and store.ddate <= '{$requestData['cdate']}'";
        }
        $sqlc = "select count(*) as c from store where 1 {$s}";

        $count = $this->model->getRecords($sqlc);

        $pre = 10;

        $totalpage = ceil($count[0]['c']/$pre);

        $page = isset($requestData['page']) ? $requestData['page'] : 1;
        if($page > $totalpage) $page = $totalpage;
        if($page < 1) $page = 1;
        $begin = ($page - 1) * $pre;
        $sql = "select * from store left join items on items.id = store.itemsid where 1 {$s} order by store.id desc limit {$begin},{$pre}";
        $list = $this->model->getRecords($sql);

        $itemsTemp = DB::table('items')->get();
        $items = [];

        foreach($itemsTemp as $v){
            $items[$v->id] = $v->pname;
        }
        $pagelist = $page -3 > 0 ? $page -3 : 1;

        return view('html.list',[
            'list'  => $list,
            'store' =>  config('database.store'),
            'items' =>  $items,
            'request' => $requestData,
            'total' =>  $totalpage,
            'pagebegin' =>  $pagelist,
            'page'  => $page,
            'c'     =>  $count[0]['c'],
            'type'  =>  [1=>'入库' , 2 => '出库',3=>'报损']
        ]);
    }

    public function last(){

        $sql = "select
            sum(num) as s,
            itemsid,
            items.pname,
            store.store
        from
            store
        left join items on items.id = store.itemsid
        group by
            itemsid
        order by store.id desc";

        $list = $this->model->getRecords($sql);
        $itemsTemp = DB::table('items')->get();
        $items = [];

        foreach($itemsTemp as $v){
            $items[$v->id] = $v->pname;
        }

        return view('html.last',[
            'list'  => $list,
            'store' =>  config('database.store'),
            'items' =>  $items
        ]);
    }


    //
}
