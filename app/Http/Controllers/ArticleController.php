<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Article;
use App\Http\Requests\StoreArticelPost;
use Validator;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      $tname=request()->tname??'';
        $where=[];
        if($tname){
            $where[]=['tname','like',"%$tname%"];
        }
    
     $pageSize=config('app.pageSize');

      $data=article::where($where)->orderby('a_id','desc')->paginate($pageSize);
     //dd($data);
       return view('article.index',['data'=>$data,'tname'=>$tname]); 
      
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('article.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->except('_token');
        //dd($data);
        //文件上传
          $validator=Validator::make($data,[
               // 'tname'=>'required|unique:article|regex:/^[\x{4e00}-\x{9fa5}A-Za-z-9_-]{2,12}$/u',
              'tname'=>'required|unique:article',
                ],[
                'tname.required'=>'商品名称不能为空',
                'tname.unique'=>'商品存在',
                //'tname.regex'=>'商品是中文,字母,下划线,数字组成',
                
      
        ]);
        if($validator->fails()){
            return redirect('article/create')
         ->withErrors($validator)
             ->withInput();
         }
        if($request->hasFile('head')){
            $data['head']=$this->upload('head');
           // dd($img);
        }
    
        $res=Article::insert($data);
       // dd($res);
        if($res){
            return redirect('/article');
        }
    }
    /**上传文件
     * [upload description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
        public function upload($filename){
            //判断上传过程有误错误
            if(request()->file($filename)->isValid()){
            //介绍值
            $photo= request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
            }
            exit('未获取到上传文件或者上传过程出错');
        }
        // public function checkOnly(){
        //     $tname=request()->tname;
        //     $count= News::where(['tname'=>$tname])->count();
        //     echo json_(['code'=>'00000','msg'=>'ok','count'=>$count]);
        // }
    /**
     * Display the specified resource.
     *预留详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
          $user=Article::where('a_id',$id)->first();
     return view('article.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo $id;
        $user =$request->except('_token');
       // dd($user);
          if($request->hasFile('head')){
            $user['head']=$this->upload('head');
           // dd($img);
        }
      
      $res=Article::where('a_id',$id)->update($user);
        if($res!==false){
            return redirect('/article');
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *删除方法
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      $res=Article::destroy($id);
      if($res){
        return redirect('/article');
      }
    }
}
