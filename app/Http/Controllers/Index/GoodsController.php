<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Cookie;
// use App\Users;
 use App\Goods;
// use Illuminate\Support\Facades\Validator;
class GoodsController extends Controller
{
  

//列表详情
public function proinfo($id){

    $data=Goods::where('shop_id',$id)->first();
     return view('index.proinfo',['data'=>$data]);
}



    


   


}
