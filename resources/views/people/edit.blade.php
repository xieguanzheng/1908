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
<center><h1>外来人口编辑</h1></center>
<form  action="{{url('/people/update/'.$user->p_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->username}}" name="username" id="firstname" 
				   placeholder="请输入名字">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">年龄</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->age}}" name="age" id="lastname" 
				   placeholder="请输年龄">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">身份证</label>
		<div class="col-sm-10">
			<input type="text" class="form-control"	value="{{$user->card}}" name="card" id="lastname" 
				   placeholder="请输身份证">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否是湖北人</label>
	<div class="radio">
    <label>
        <input type="radio" name="is_hubei" id="optionsRadios1"  value="1" @if($user->
        is_hubei==1) checked  @endif>是  
    </label>
    <label>
        <input type="radio" name="is_hubei" id="optionsRadios2"  value="2" @if($user->
        is_hubei==2) checked  @endif>否
    </label>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-8">
			<img src="{{env('UPLOAD_URL')}}{{$user->head}}" width="50" height="50">
				<input type="file" name="head" class="form-control">

		</div>
		</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>