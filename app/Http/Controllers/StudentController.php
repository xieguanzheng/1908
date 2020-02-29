<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DB;
use App\Student;
use App\Http\Requests\StoreStudentPost;
use Validator;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cname=request()->cname??'';
        $where=[];
        if($cname){
            $where[]=['cname','like',"%$cname%"];
        }
    
     $pageSize=config('app.pageSize');

      $data=student::where($where)->orderby('c_id','desc')->paginate($pageSize);
     //dd($data);
       return view('student.index',['data'=>$data,'cname'=>$cname]); 
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('student.create'); 
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
       
        $data =$request->except('_token');
        //dd($data);
        //第三章
        $validator=Validator::make($data,[
                  'cname'=>'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z-9_-]{2,12}$/u',
                 'grade'=>'required|numeric|between:0,100',
                ],[
             'cname.required'=>'名字不能为空',
             'cname.unique'=>'名字存在',
             'cname.regex'=>'必须是中文,字母,下划线,数字组成且2,12位',
            'grade.required'=>'成绩必填',
            'grade.numeric'=>'必须是数字',
            'grade.between'=>'不能超过100',
        ]);
        if($validator->fails()){
            return redirect('student/create')
            ->withErrors($validator)
            ->withInput();
        }
    
        $res=Student::insert($data);
       // dd($res);
        if($res){
            return redirect('/student');
        }
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
          $user=Student::where('c_id',$id)->first();
     return view('student.edit',['user'=>$user]);
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
         $validator=Validator::make($user,[
                  'cname'=>'unique:student|regex:/^[\x{4e00}-\x{9fa5}A-Za-z-9_-]{2,12}$/u',
                 'grade'=>'required|numeric|between:0,100',
                ],[
             'cname.required'=>'名字不能为空',
             'cname.unique'=>'名字存在',
             'cname.regex'=>'必须是中文,字母,下划线,数字组成且2,12位',
            'grade.required'=>'成绩必填',
            'grade.numeric'=>'必须是数字',
            'grade.between'=>'不能超过100',
        ]);
        if($validator->fails()){
            return redirect('student/edit/'.$id)
            ->withErrors($validator)
            ->withInput();
        }
    
      $res=Student::where('c_id',$id)->update($user);
        if($res!==false){
            return redirect('/student');
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
     
      $res=Student::destroy($id);
      if($res){
        return redirect('/student');
      }
    }
}
