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
	@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<center><h1>学生表</h1></center>
<form  action="{{url('/student/update/'.$user->c_id)}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">学生姓名</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->cname}}" name="cname" id="firstname" 
				   placeholder="请输入姓名">
				   <b style="color:red">{{$errors->first('cname')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">学生性别</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->gender}}"name="gender"  id="lastname" 
				   placeholder="请输性别">
				   
				    <b style="color:red">{{$errors->first('gender')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">班级</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->class}}" name="class" id="lastname" 
				   placeholder="请输入班级">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">成绩</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" value="{{$user->grade}}" name="grade" id="lastname" 
				   placeholder="请输入成绩">
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