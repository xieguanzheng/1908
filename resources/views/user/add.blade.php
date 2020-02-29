<tr>服装</tr>
<h2>商品添加</h2>
<form action="{{url('/adddo')}}" method="post">
	@csrf
<input type="text" name="name"/>
<input type="number" name="age"/>
<input type="submit" value="添加"/>	
</form>