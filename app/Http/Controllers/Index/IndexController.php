<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Users;
use App\Goods;
use Illuminate\Support\Facades\Validator;
class IndexController extends Controller
{
  

    public function index(){
         $data=Goods::get();
        return view('index.index',['data'=>$data]);
    }
    




    


   


}
