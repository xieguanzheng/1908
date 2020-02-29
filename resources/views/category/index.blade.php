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
<table class="table">
	<thead>
		<tr>
			<td>分类ID</td>
			<td>分类名称</td>
			<td>分类描述</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		@foreach($cate as $v)
		<tr>	<th>{{$v->cate_id}}</th>
			<th>{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</th>
			<th>{{$v->desc}}</th>
			<td>
				<a href="{{url('news/edit/'.$v->n_id)}}">编辑</a>|
				<a href="javascript:void(0)" onclick="del({{$v->n_id}})">删除</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>
<script>
	function del(id){
		if(!id){
			return;
		}
		if(confirm('是否要删除记录')){
			$.get('/news/destory/'+id,function(reult){
				if(result.code=='00000'){
					location.reload();
				}
			},'json')
		}
	}

</script>
</body>
</html>