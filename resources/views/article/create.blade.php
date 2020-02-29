<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>

</head>
<!-- <meta name="csrf-token" content="{{csrf_token()}}"> -->
<body>
	<!-- @if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif  -->
​<form  action="{{url('/article/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
<table>
  <tr>
  	<td>商品名称</td>
  	<td><input type="text" name="tname"></td>
  	 <b style="color:red">{{$errors->first('tname')}}</b>
  </tr>
   <tr>
  	<td>分类</td>
  	<td>
      <input type="text" name="classify">
 </td>
  </tr>

   <tr>
  	<td>商品描述</td>
  	<td><textarea name="des"></textarea></td>
  </tr> 
   <tr>
  	<td><input type="submit" value="添加"></td>
  	<td></td>
  </tr>

   </table>
</form>
​<!-- <script>
	$('input[name="tname"]').blur(function(){
		$(this).next().html('');
		var tname =$(this).val();
		var reg=/^[\u4e00-\u9fa50-9A-Za-z_]+$/;
		if(!reg.test(tname)){
			$(this).next().html('文章标题由中文字母数字组成切不能为空');
			return;
		}
		$.ajaxSetup({ headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
		$.ajax({
			type:'post',
			url:"/article/checkOnly",
			data:{tname:tname},
			dataType:'json',
			success:function(result){
				if(result.count<0){
					$('input[name="tname"]').next().html('标题存在');
				}
			
		}});
	})
</script> -->
</body>
</html>