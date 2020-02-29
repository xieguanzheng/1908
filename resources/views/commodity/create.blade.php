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
<center><h1>商品添加</h1></center>
<form  action="{{url('/commodity/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="cname" id="firstname" 
				   placeholder="请输入名称">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">商品LOGO</label>
		<div class="col-sm-10">
				<input type="file" name="head" class="form-control">
		</div>
		</div>
		<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品网址</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="url" id="firstname" 
				   placeholder="请输入商品网址">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>