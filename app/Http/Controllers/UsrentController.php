<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Usrent;
use App\Http\Requests\StoreUsrentPost;
use Validator;
class UsrentController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uname=request()->uname??'';
        $where=[];
        if($uname){
            $where[]=['uname','like',"%$uname%"];
        }

     $pageSize=config('app.pageSize');

      $data=Usrent::where($where)->orderby('uid','desc')->paginate($pageSize);
     //dd($data);
       return view('usrent.index',['data'=>$data,'uname'=>$uname]); 
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('usrent.create'); 
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
        //第三章
        $validator=Validator::make($data,[
                'uname'=>'required|unique:usrent|max:12|min:2',
                
                ],[
            
            'uname.required'=>'名字不能为空',
             'uname.unique'=>'名字存在',
             'uname.max'=>'名字长度不能错过12位',
             'uname.min'=>'名字不长度不少于2位',
      
        ]);
        if($validator->fails()){
            return redirect('usrent/create')
            ->withErrors($validator)
            ->withInput();
        }
        //文件上传
      
    
        $res=Usrent::insert($data);
       // dd($res);
        if($res){
            return redirect('/usrent');
        }
    }
    /**上传文件
     * [upload description]
     * @param  [type] $filename [description]
     * @return [type]           [description]
     */
        public function upload($filename){
            //判断上传过程有误错误
          
        }
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
     
          $user=Usrent::where('uid',$id)->first();
     return view('usrent.edit',['user'=>$user]);
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
      
      $res=Usrent::where('uid',$id)->update($user);
        if($res!==false){
            return redirect('/usrent');
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
    
      $res=Usrent::destroy($id);
      if($res){
        return redirect('/usrent');
      }
    }
}

