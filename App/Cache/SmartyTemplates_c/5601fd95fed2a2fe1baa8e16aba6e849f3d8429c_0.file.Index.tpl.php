<?php
/* Smarty version 3.1.29, created on 2016-06-21 00:13:29
  from "C:\www\Grace\GraceEasy\App\Views\Admin\Index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5768162954f8e4_47784326',
  'file_dependency' => 
  array (
    '5601fd95fed2a2fe1baa8e16aba6e849f3d8429c' => 
    array (
      0 => 'C:\\www\\Grace\\GraceEasy\\App\\Views\\Admin\\Index.tpl',
      1 => 1466424936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5768162954f8e4_47784326 ($_smarty_tpl) {
?>
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
      <td><input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2">description</td>
      <td><input type="text" name="description" value="<?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>    <?php
$_from = $_smarty_tpl->tpl_vars['res']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo'] : false;
$__foreach_foo_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_foo_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_foo'] = new Smarty_Variable(array('index' => -1));
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']++;
$__foreach_foo_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>

    <tr>
      <td height="30"><input name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][sort]" type="text" value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'] : null);?>
" size="5" maxlength="5"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
      
      
      
    <td height="30"><input type="hidden" name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][chr]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
"><a href='/admin/lm/?chr=<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
'><?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
</a></td>
    
    
    
      <td> <input type="text" name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
"></td>
      
      <td> <input name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][des]" type="text" size="60" maxlength="60" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['des'];?>
"></td>
    <td><input name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][path]" type="hidden" size="60" maxlength="60" value="?chr=<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['path'];?>
</td>
  </tr>
    <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_foo_0_saved_local_item;
}
if ($__foreach_foo_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_foo'] = $__foreach_foo_0_saved;
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_foo_0_saved_item;
}
if ($__foreach_foo_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_foo_0_saved_key;
}
?>
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
</html><?php }
}
