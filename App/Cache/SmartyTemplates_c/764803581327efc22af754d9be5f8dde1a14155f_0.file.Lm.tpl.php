<?php
/* Smarty version 3.1.29, created on 2016-06-21 02:46:22
  from "C:\www\Grace\GraceEasy\App\Views\Admin\Lm.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_576839fe5cc657_07641217',
  'file_dependency' => 
  array (
    '764803581327efc22af754d9be5f8dde1a14155f' => 
    array (
      0 => 'C:\\www\\Grace\\GraceEasy\\App\\Views\\Admin\\Lm.tpl',
      1 => 1466448380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_576839fe5cc657_07641217 ($_smarty_tpl) {
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
<p>导航 : <a href="/admin/">index</a>-&gt; </p>
<table width="50%" border="1">
  <tr>
    <td width="60">sort</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['sort'];?>
</td>
  </tr>
  <tr>
    <td>chr</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['chr'];?>
</td>
  </tr>
  <tr>
    <td>title</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
</td>
  </tr>
  <tr>
    <td>des</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['des'];?>
</td>
  </tr>
  <tr>
    <td>path</td>
    <td><?php echo $_smarty_tpl->tpl_vars['info']->value['path'];?>
</td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
      <input name="chr" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
">
      <input name="title" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
">
      <input name="description" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['description'];?>
">
      <input name="type" type="radio" value="0" <?php if ($_smarty_tpl->tpl_vars['res']->value['type'] != 1) {?>checked<?php }?>>
      收起
      <input type="radio" name="type" value="1" <?php if ($_smarty_tpl->tpl_vars['res']->value['type'] == 1) {?>checked<?php }?>>
      展开

<table width="99%" border="1">
  <tr>
    <td height="30">序号</td>
    <td height="30">chr</td>
    <td>title</td>
    <td>des</td>
  </tr>
  <?php
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
" size="5" maxlength="5"></td>
    
    <td height="30"><input type="hidden" name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][chr]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
">
      <a href='/admin/lm/?chr=<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
'><?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
</a></td>
    <td><input type="text" name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][title]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
"></td>
    <td><input name="list[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
][des]" type="text" size="60" maxlength="60" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['des'];?>
"></td>
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
    <td colspan="4"><p>
      <input type="submit" name="button" id="button" value="提交">
    </p></td>
  </tr>
</table>
</form>
<pre>&nbsp;</pre>
<p>&nbsp;</p>
</body>
</html><?php }
}
