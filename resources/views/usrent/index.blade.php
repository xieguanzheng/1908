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
<form>
	
	<input type="text" name="uname" value="{{$uname}}" placeholder="请输入管理员">
	<input type="submit" value="搜索">
</form>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>用户名称</th>
			<th>用户身份</th>
			
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->uid}}</th>
			<th>{{$v->uname}}</th>
			<th>{{$v->is_new==1?'主管':'库管'}}</th>
			<td><a href="{{url('usrent/edit/'.$v->uid)}}" class="btn btn-success">编辑</a>
				<a href="{{url('usrent/destroy/'.$v->uid)}}" class="btn btn-info">删除</a>

			</td>
		</tr>
		@endforeach
		<tr><td colspan="7">{{$data->appends(['uname'=>$uname])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>