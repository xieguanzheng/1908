<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - 水平表单</title>
	<link rel="stylesheet" href="/static/css/bootstrap.min.css">  
	<script src="/static/js/jquery.min.js"></script>
	<script src="/static/js/bootstrap.min.js"></script>
</head>
<body>
​<form  action="{{url('/article/update/'.$user->a_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
<table>
  <tr>
  	<td>商品名称</td>
  	<td><input type="text" value="{{$user->tname}}" name="tname"></td>
  </tr>
   <tr>
  	<td>分类</td>
  	<td><input type="text"value="{{$user->classify}}" name="classify"></td>
  </tr>
   <tr>
   <tr>
  	<td>商品描述</td>
  	<td><textarea name="des">{{$user->des}}</textarea></td>
  </tr>
  </tr>
   <tr>
  	<td><input type="submit" value="修改"></td>
  	<td></td>
  </tr>

   </table>
</form>
​
</body>
</html>