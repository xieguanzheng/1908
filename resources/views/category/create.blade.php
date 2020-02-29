<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  	<script src="/static/js/jquery.min.js"></script>
  	<meta name="csrf-token" content="{{csrf_token()}}"> 
 </head>
 <body>
    <form action="{{url('/category/store')}}" method="post" >
    @csrf
        <table>
            <tr>
                <td>商品名称</td>
                <td>
                  <input type="text" name="cate_name">
                  <b style="color:red">{{$errors->first('sname')}}</b>
               </td>
            </tr>
            <tr>
                <td>父级分类</td>
                <td>
                    <select name="parent_id">
                            <option value="0">--请选择--</option>
                            @foreach($cate as $v)
                            <option value="{{$v->parent_id}}">{{str_repeat('|--',$v->level)}}{{$v->cate_name}}</option>
                             @endforeach
                        </select>
                </td>
            </tr>
            <tr>
                <td>描述</td>
                <td>
                   <textarea name="desc"></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="添加"></td>
                <td></td>
            </tr>
        </table>
    </form>
   
 </body>
</html>
