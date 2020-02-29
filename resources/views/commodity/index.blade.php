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
<center><h1>商品列表</h1></center>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>商品名称</th>
			<th>商品LOGO</th>
			<th>商品网址</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->c_id}}</th>
			<th>{{$v->cname}}</th>
			<th>@if($v->head)<img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="30" height="30"> 
			@endif</th>
			<th>{{$v->url}}</th>
			<td><a href="{{url('commodity/edit/'.$v->c_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('commodity/destroy/'.$v->c_id)}}" class="btn btn-info">删除</a>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>