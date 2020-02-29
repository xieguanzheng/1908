<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Admin;
use App\Http\Requests\StoreAdminPost;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username=request()->username??'';
        $where=[];
        if($username){
            $where[]=['username','like',"%$username%"];
        }
     // $data =DB::table('people')->select('*')->get();
     //$data=People::all();
     $pageSize=config('app.pageSize');

      $data=Admin::where($where)->orderby('admin_id','desc')->paginate($pageSize);
     //dd($data);
       return view('admin.index',['data'=>$data,'username'=>$username]); 
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('admin.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //public function store(StorePeoplePost $request)
    {
        //第一种验证
        // $request->validate([
        //     'username'=>'required|unique:people|max:12|min:2',
        //     'age'=>'required|integer|min:1|max:3',
        // ],[
            
        //     'username.required'=>'名字不能为空',
        //     'username.unique'=>'名字存在',
        //     'username.max'=>'名字长度不能错过12位',
        //     'username.min'=>'名字不长度不少于2位',
        //     'age.required'=>'年龄不能为空',
        //     'age.integer'=>'年龄必须为数字',
        //     'age.min'=>'年龄数据不合法',
        //     'age.required'=>'年龄数据不合法',
        // ]);
        $data =$request->except('_token');
        //dd($data);
        //第三章
        $validator=Validator::make($data,[
                'username'=>'required|unique:people|max:12|min:2',
                
                ],[
            
             'username.required'=>'名字不能为空',
             'username.unique'=>'名字存在',
             'username.max'=>'名字长度不能错过12位',
             'username.min'=>'名字不长度不少于2位',
            
      
        ]);
        if($validator->fails()){
            return redirect('admin/create')
            ->withErrors($validator)
            ->withInput();
        }
        //文件上传
        if($request->hasFile('head')){
            $data['head']=$this->upload('head');
           // dd($img);
        }
    
        
        //DB
       // $res=DB::table('people')->insert($data);
        //ORM save
        // $people =new People;
        // $people->username=$data['username'];
        // $people->age=$data['age'];
        // $people->card=$data['card'];
        // $people->head=$data['head'];
        // $people->add_time=$data['add_time'];
        // $res=$people->save();
        //ORM create
       // $res=People::create($data);
        $res=Admin::insert($data);
       // dd($res);
        if($res){
            return redirect('/admin');
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
      //$user =DB::table('people')->where('p_id',$id)->first();
       // $user=People::find($id);
          $user=Admin::where('admin_id',$id)->first();
     return view('admin.edit',['user'=>$user]);
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
       // $res =DB::table('people')->where('p_id',$id)->update($user);
       // $people=People::find($id);
       // //dd($people);
       //   $people->username=$user['username'];
       //   $people->age=$user['age'];
       //   $people->card=$user['card'];
       //   $people->head=$user['head']??'';
       //   $res=$people->save();
      $res=Admin::where('admin_id',$id)->update($user);
        if($res!==false){
            return redirect('/admin');
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
      //echo $id;
      //$res =DB::table('people')->where('p_id',$id)->delete();
      $res=Admin::destroy($id);
      if($res){
        return redirect('/admin');
      }
    }
}

