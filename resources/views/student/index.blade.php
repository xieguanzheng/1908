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
<form>
	<input type="text" name="cname" value="{{$cname}}" placeholder="请输入用户名">
	<input type="submit" value="搜索">
		
</form>
<center><h1>学生列表</h1></center>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>学生姓名</th>
			<th>学生性别</th>
			<th>班级</th>
			<th>成绩</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->c_id}}</th>
			<th>{{$v->cname}}</th>
			<th>{{$v->gender}}</th>
			<th>{{$v->class}}</th>
			<th>{{$v->grade}}</th>
			<td><a href="{{url('student/edit/'.$v->c_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('student/destroy/'.$v->c_id)}}" class="btn btn-info">删除</a>

			</td>
		</tr>
		@endforeach
			<tr><td colspan="7">{{$data->appends(['cname'=>$cname])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>