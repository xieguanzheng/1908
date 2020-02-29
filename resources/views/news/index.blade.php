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
		<input type="text" name="title" />
		<button>搜索</button>
	</form>
<table class="table">
	<thead>
		<tr>
			<td>文章ID</td>
			<td>文章标题</td>
			<td>文章分类</td>
			<td>是否显示</td>
			<td>文章作者</td>
			<td>作者Emali</td>
			<td>图片</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $v)
		<tr>	<th>{{$v->n_id}}</th>
			<th>{{$v->title}}</th>
			<th>{{$v->cate_name}}</th>
			<td>{{$v->is_show?'√':'×'}}</td>
			<td>{{$v->author}}</td>
			<td>{{$v->email}}</td>
			<th>@if($v->img)<img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="30" height="30"> 
			@endif</th>
			<td>
				<a href="{{url('news/edit/'.$v->n_id)}}">编辑</a>|
				<a href="javascript:void(0)" onclick="del({{$v->n_id}})">删除</a>
			</td>
		</tr>
		@endforeach
<tr>
	<td colspan="8">{{$data->appends($query)->links()}}</td>
</tr>
	</tbody>
</table>
<script>
//ajax分页
$(document).on('click','.pagination a',function(){
	var url=$(this).attr('href');
	if (!url){
		return;
	}
	$.get(url,function(result)){
		$('tbody').html(result);
	}
	return false;
})





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