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
	<input type="text" name="mname" value="{{$mname}}" placeholder="请输入用户名">
	<input type="submit" value="搜索">
</form> 
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>商品名称</th>
			<th>商品货号</th>
			<th>商品价格</th>
			<th>商品缩略图</th>
			<th>商品库存</th>
			<th>是否精品</th>
			<th>是否热销</th>
			<th>商品详情</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($data as $k=>$v)
		<tr @if($k%2==0) class="active" @else class="success" @endif>
			<th>{{$v->m_id}}</th>
			<th>{{$v->mname}}</th>
			<th>{{$v->cargo}}</th>
			<th>{{$v->price}}</th>
			<th>@if($v->head)<img src="{{env('UPLOAD_URL')}}{{$v->head}}" width="30" height="30"> 
			@endif</th>
			<th>{{$v->repertoty}}</th>
			<th>{{$v->quality==1?'是':'否'}}</th>
			<th>{{$v->like==1?'是':'否'}}</th>
			<th>{{$v->desc}}</th>
			<th>{{$v->brand}}</th>
			<!-- <td><a href="{{url('people/edit/'.$v->p_id)}}" class="btn btn-success">编辑</a>
				<a href="{{url('people/destroy/'.$v->p_id)}}" class="btn btn-info">删除</a>

			</td> -->
		</tr>
		@endforeach
		<tr><td colspan="7">{{$data->appends(['mname'=>$mname])->links()}}</td></tr>
	</tbody>
</table>
</body>
</html>