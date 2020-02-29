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
<center><h1>库存管理后台</h1></center>

<form  action="{{url('/usrent/store')}}" method="post" class="form-horizontal" role="form"">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">用户名称</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" name="uname" id="firstname" 
				   placeholder="请输入名字">
				
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">用户身份</label>
	<div class="radio">
    <label>
        <input type="radio" name="is_new" id="optionsRadios1"  value="1">主管  
    </label>
    <label>
        <input type="radio" name="is_new" id="optionsRadios2"  value="2" checked>库管
    </label>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>