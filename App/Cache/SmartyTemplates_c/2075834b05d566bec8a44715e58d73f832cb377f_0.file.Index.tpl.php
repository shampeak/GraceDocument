<?php
/* Smarty version 3.1.29, created on 2016-06-21 00:32:13
  from "C:\www\Grace\GraceEasy\App\Views\Lm\Index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57681a8d2b6470_56491254',
  'file_dependency' => 
  array (
    '2075834b05d566bec8a44715e58d73f832cb377f' => 
    array (
      0 => 'C:\\www\\Grace\\GraceEasy\\App\\Views\\Lm\\Index.tpl',
      1 => 1466440263,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57681a8d2b6470_56491254 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</title>
   
    <!-- Bootstrap -->
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  <style>
    #te {
		padding-left: 0px;
		padding-right: 0px;
    }
    </style>


  </head>
  <body>
  

<div class="container-fluid">

<div class="row">
  <div class="col-md-12" id="te">
  
  
<ol class="breadcrumb">
  <li><a href="/">首页</a></li>
  <li><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
</ol>  
<div class="list-group">
  <?php
$_from = $_smarty_tpl->tpl_vars['res']->value['list'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_foo_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_foo_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
  <a href="lm/view?chr=<?php echo $_smarty_tpl->tpl_vars['res']->value['chr'];?>
&child=<?php echo $_smarty_tpl->tpl_vars['value']->value['chr'];?>
" class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</a>
  <?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_foo_0_saved_local_item;
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_foo_0_saved_item;
}
if ($__foreach_foo_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_foo_0_saved_key;
}
?>
</div>  
  

  </div>
</div>



</div>











    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="/assets/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <?php echo '<script'; ?>
 src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
