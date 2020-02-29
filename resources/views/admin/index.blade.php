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
<center><h1>管理员列表</h1></center>
<form>
	<input type="text" name="username" value="{{$username}}" placeholder="请输入账号">
	<input type="submit" value="搜索">
</form>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>账号</th>
		
			<th>手机号</th>
			<th>邮箱</th>
			<th>头像</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->admin_id}}</th>
			<th>{{$v->username}}</th>
			
			<th>{{$v->tel}}</th>
			<th>{{$v->email}}</th>
			<th>@if($v->head)<img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="30" height="30"> 
			@endif</th>
			<td><a href="{{url('admin/edit/'.$v->admin_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('admin/destroy/'.$v->admin_id)}}" class="btn btn-info">删除</a>

			</td>
		</tr>
		@endforeach
		<tr><td colspan="7">{{$data->appends(['username'=>$username])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>