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
<form>
	<input type="text" name="tname" value="{{$tname}}" placeholder="商品名称">
	<input type="submit" value="搜索">
</form>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>商品名称</th>
			<th>分类</th>
			<th>商品描述</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->a_id}}</th>
			<th>{{$v->tname}}</th>
			<th>{{$v->classify}}</th>
			<th>{{$v->des}}</th>
			<td><a href="{{url('article/edit/'.$v->a_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('article/destroy/'.$v->a_id)}}" class="btn btn-info">删除</a>

			</td>
		</tr>

		@endforeach
		<tr><td colspan="7">{{$data->appends(['tname'=>$tname])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>