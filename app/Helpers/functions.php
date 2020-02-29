<?php
 function CreateTree($data,$parent_id=0,$level=0){
    if(!$data){
        return;
    }
    static $newarray=[];
    foreach($data as $k=>$v){
            if($v->parent_id==$parent_id){
                $v->level=$level;
                $newarray[]=$v;
                CreateTree($data,$v->cate_id,$level+1);
            }
    }
    return $newarray;
}
//单文件
 function uploads($filename){
            //判断上传过程有误错误
          $photo =request()->file($filename);
          if ($photo->isValid()){
              $store_result=$photo->store('uploads');
            return $store_result;
          }
            //上传
          
            
            exit('未获取到上传文件或者上传过程出错');
        }
//多文件
function Moreuploads($filename){
            //判断上传过程有误错误
            $photo =request()->file($filename);
            if(!is_array($photo)){
                return;
            }
       
            foreach($photo as $v){
                $photo =request()->file($filename);
              if(!is_array($photo)){
                return;
              }
              foreach($photo as $v){
                if($v->isValid()){
                    $store_result[]=$v->store('uploads');
                }
              }
            return $store_result;
            }
            // 
             }
            // exit('未获取到上传文件或者上传过程出错');
     
?>