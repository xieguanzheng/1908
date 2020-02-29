<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Goods;
use Illuminate\support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $shop_name=request()->shop_name??'';
         $where=[];
         if($shop_name){
             $where[]=['shop_name','list',"%shop_name%"];
         }
        // dd($where);
        $page=request()->page??1;

       
        //$goods=cache('goods_'.$page.'_'.$shop_name);
        //$goods=Cache::get('goods_'.$page.'_'.$shop_name);
        $goods=Redis::get('goods_'.$page.'_'.$shop_name);
       // dd($goods);
        if(!$goods){
          //  echo "走DB==";
        $pageSize=config('app.pageSize');
        $goods =Goods::leftjoin('brand','goods.b_id','=','brand.brand_id')
                        ->leftjoin('category','goods.cate_id','=','category.cate_id')
                        ->orderby('shop_id','desc')
                        ->paginate($pageSize);
                    //Cache::put('goods',$goods,60*60*24*30);
                    //cache(['goods_'.$page=>$goods],60*60*24*30);
                    $goods=serialize($goods);
                    Redis::setex('goods_'.$page.'_'.$shop_name,20,$goods);
                 }
                 $goods=unserialize($goods);


                return view('goods.index',['goods'=>$goods,'query'=>request()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand=Brand::all();
       // dd($brand);
       $cate= Category::all();
       $cate=CreateTree($cate);
       //dd($cate);
       return view('goods.create',['brand'=>$brand,'cate'=>$cate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->except('_token');
        //单文件
        if($request->hasFile('shop_img')){
            $data['shop_img']=uploads('shop_img');
        }
        if($data['shop_file']){
            $photos=Moreuploads('shop_file');
            $data['shop_file']=implode('|',$photos);
        }
       $res=Goods::create($data);
       //dd($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
