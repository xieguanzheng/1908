<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  	<script src="/static/js/jquery.min.js"></script>
  	<meta name="csrf-token" content="{{csrf_token()}}"> 
 </head>
 <body>
    <form action="{{url('/news/update/'.$data->n_id)}}" method="post" enctype="multipart/form-data">
    @csrf
        <table>
            <tr>
                <td>文章标题</td>
                <td>
                  <input type="text" value="{{$data->title}}" name="title">
                  <b style="color:red">{{$errors->first('sname')}}</b>
               </td>
            </tr>
            <tr>
                <td>文章分类</td>
                <td>
                    <select name="cate_id">
                            <option value="0">--请选择--</option>
                            @foreach($cate as $v)
                           <option value="{{$v->cate_id}}" @if($v->cate_id==$data->cate_id) selected="selectde" @endif>{{$v->cate_name}}</option>
                             @endforeach
                        </select>
                </td>
            </tr>
            <tr>
                <td>文章重要性</td>
                <td>
                    <input type="radio" name="is_import" value="1" @if($data->is_import==1) checked @endif>普通
                     <input type="radio" name="is_import" value="2" @if($data->is_import==2) checked @endif>置顶
                </td>
            </tr>
            <tr>
                <td>是否显示</td>
                <td>
                    <input type="radio" name="is_show" value="1" @if($data->is_showt==1) checked @endif>显示
                    <input type="radio" name="is_show" value="2" @if($data->is_show==1) checked @endif>不显示
                </td>
            </tr>
            <tr>
                <td>文章作者</td>
                <td>
                  <input type="text" value="{{$data->author}}" name="author">
                  <b style="color:red">{{$errors->first('szz')}}</b>
                </td>
            </tr>
            <tr>
                <td>作者email</td>
                <td><input type="text" value="{{$data->email}}" name="email">
                <b style="color:red">
                     {{$errors->first('semail')}} 
                 </b></td>
            </tr>
             
            <tr>
                <td>上传文件</td>
                    <img src="{{env('UPLOAD_URL')}}{{$data->img}}" width="50" height="50">
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td><input type="button" value="编辑"></td>
                <td></td>
            </tr>
        </table>
    </form>
    <script>
        $.ajaxSetup({headers:{'X-CSRF-TONKE':$('meta[name="csrf-token"]').attr('content')}});
        var n_id= {{$data->n_id}};
    	$('input[type="button"]').click(function(){
    		var titleflag=true;
    		$('input[name="title"]').next().html('');
    		var title=$('input[name="title"]').val();
    		var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
    		if(!reg.test(title)){
    		$('input[name="title"]').next().html('文章标题由中文字母数字组成切不能为空');
    			return;
    		}
    		$.ajax({
    			type:'get',
    			url:"/news/chekcOnly",
    			data:{title:title,n_id:n_id},
    			async:false,
    			dataType:'json',
    			success:function(result){
    				if(result.count>0){
    					$('input[name="title"]').next().html('标题存在');
    					titleflag=false;
    				}
    			
    		}});
    		if (!titleflag){
    			return;
    		}
			//作者验证
			var author=$('input[name="author"]').val();
			var reg=/^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    		if(!reg.test(author)){
    			$('input[name="author"]').next().html('文章作者由中文字母数字组成切长度为2-8位');
    			return;
    		}
    		$('form').submit();
    	});

    	$('input[name="author"]').blur(function(){
    		$(this).next().html('');
    		var author=$(this).val();
    		var reg=/^[\u4e00-\u9fa50-9A-Za-z_]{2,8}$/;
    		if(!reg.test(author)){
    			$(this).next().html('文章作者由中文字母数字组成切长度为2-8位');
    			return;
    		}
    	})
    	$('input[name="title"]').blur(function(){
    		$(this).next().html('');
    		var title=$(this).val();
    		var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
    		if(!reg.test(title)){
    		$(this).next().html('文章标题由中文字母数字组成切不能为空');
    			return;
    		}
   
    		$.ajax({
    			type:'get',
    			url:"/news/chekcOnly",
    			data:{title:title,n_id:n_id},
    			dataType:'json',
    			success:function(result){
    				if(result.count>0){
    					$('input[name="title"]').next().html('标题存在');
    				}
    			
    		}});
    	})
    </script>
 </body>
</html>
