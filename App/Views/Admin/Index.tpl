<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | General UI</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <!-- Theme style -->
    <link href="/assets/LTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <![endif]-->
</head>
<body class="skin-black">
        <form name="form1" method="post" action="">

<table width="99%" border="1">
  <tr>
    <td height="30">序号</td>
      <td height="30">chr</td>
      <td>title</td>
      <td>des</td>
      <td>path</td>
  </tr>

    <tr>
      <td height="30" colspan="2">title</td>
      <td><input type="text" name="title" value="{$res['title']}"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2">description</td>
      <td><input type="text" name="description" value="{$res['description']}"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>    {foreach from=$res['list'] key=key item=value name=foo}

    <tr>
      <td height="30"><input name="list[{$key}][sort]" type="text" value="{$smarty.foreach.foo.index}" size="5" maxlength="5">{$key}</td>
      
      
      
    <td height="30"><input type="hidden" name="list[{$key}][chr]" value="{$value['chr']}"><a href='/admin/lm/?chr={$value['chr']}'>{$value['chr']}</a></td>
    
    
    
      <td> <input type="text" name="list[{$key}][title]" value="{$value['title']}"></td>
      
      <td> <input name="list[{$key}][des]" type="text" size="60" maxlength="60" value="{$value['des']}"></td>
    <td><input name="list[{$key}][path]" type="hidden" size="60" maxlength="60" value="?chr={$value['chr']}">{$value['path']}</td>
  </tr>
    {/foreach}
    <tr>
      <td colspan="5"><p>
        <input type="submit" name="button" id="button" value="提交">
      </p>
      <p>功能：首页title/描述/内容排序/内容标题/描述/访问地址-由后台进行管理生成。或手写！,描述单独写到des.json文件中去---跳转&#32;?chr=phpzhidao&#32;根据配置显示所有或者单条显示</p>
      
<input name="_" type="hidden" size="60" maxlength="60" value="功能：首页title/描述/内容排序/内容标题/描述/访问地址-由后台进行管理生成。或手写！,描述单独写到des.json文件中去---跳转&#32;?chr=phpzhidao&#32;根据配置显示所有或者单条显示">      
      </td>
    </tr>
</table></form>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>

<p>&nbsp;</p>
<p>说明：</p>
<p>循环读取store目录下的文件夹下 readme.md</p>
<p>read可以根据后台设定进行重写</p>
<p>获取title /decription /and list</p>
<p>list 根据配置生成</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>点击内容跳转到相对应的内容上</p>
<p>路由结构如下</p>
<p>/pages/index	首页 点击详细跳出列表,或者所有内容展示</p>
<p>/pages/lm?path=概念云	相对应的二级内容[根据设定,显示所有内容,或者仅仅列表]</p>
<p>pages/nr?path=概念云&amp;nr=单例 [显示内容]</p>
<p>导航 首页 -&gt; 二级 -&gt; 内容</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>预处理内容</p>
<p>1 : 循环每个目录</p>
<p>获取访问的目录名和下面的readme.json</p>
<p>获得一级栏目的路径,标题,描述</p>
<p>&nbsp;</p>
<p>2 : 对栏目路径下进行循环</p>
<p>获取所有的信息,并且进行排序</p>
<p>文件list.json</p>
<p>文件名 - 描述 - 访问路径 </p>
<p>后台的操作是对readme.json和list.json进行重写</p>
<p>&nbsp;</p>
<!-- header logo: style can be found in header.less -->


</body>
</html>