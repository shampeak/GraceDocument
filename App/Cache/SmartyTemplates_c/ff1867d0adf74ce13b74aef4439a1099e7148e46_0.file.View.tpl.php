<?php
/* Smarty version 3.1.29, created on 2016-06-28 10:00:15
  from "D:\Phpleague\doc\App\Views\Lm\View.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5771da2f8cf7b0_07490473',
  'file_dependency' => 
  array (
    'ff1867d0adf74ce13b74aef4439a1099e7148e46' => 
    array (
      0 => 'D:\\Phpleague\\doc\\App\\Views\\Lm\\View.tpl',
      1 => 1467079202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5771da2f8cf7b0_07490473 ($_smarty_tpl) {
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

  <style>
    #te {
		padding-left: 0px;
		padding-right: 0px;
    }    
	#text {
		padding-left: 10px;
		padding-right: 10px;
    }
    </style>


  </head>
  <body>
  

<div class="container-fluid">

    <div class="row">
      <div class="col-md-12" id="te">
      
          
        <ol class="breadcrumb">
          <li><a href="/">首页</a></li>
          <li><a href="/lm?chr=<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</a></li>
          <li><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['res']->value['list'][$_smarty_tpl->tpl_vars['child']->value]['title'];?>
</a></li>
        </ol>  
        
<nav>
  <ul class="pagination">
    <li><?php if ($_smarty_tpl->tpl_vars['page']->value[0] != '') {?><a href="/lm/view?chr=<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
&child=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">上一页</a><?php }?></li>
    <li><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['res']->value['list'][$_smarty_tpl->tpl_vars['page']->value[1]]['title'];?>
</a></li>
    <li><?php if ($_smarty_tpl->tpl_vars['page']->value[2] != '') {?><a href="/lm/view?chr=<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
&child=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
">下一页</a><?php }?></li>
  </ul>
</nav> 
        
        <div id='text'>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div id="vsdr<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_foo']->value['index'] : null);?>
"><?php echo $_smarty_tpl->tpl_vars['nr']->value;?>
</div>
                  </div>
                </div>
        </div>
    
    
      
<nav>
  <ul class="pagination">
    <li><?php if ($_smarty_tpl->tpl_vars['page']->value[0] != '') {?><a href="/lm/view?chr=<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
&child=<?php echo $_smarty_tpl->tpl_vars['page']->value[0];?>
">上一页</a><?php }?></li>
    <li><a href="javascript:void(0)"><?php echo $_smarty_tpl->tpl_vars['res']->value['list'][$_smarty_tpl->tpl_vars['page']->value[1]]['title'];?>
</a></li>
    <li><?php if ($_smarty_tpl->tpl_vars['page']->value[2] != '') {?><a href="/lm/view?chr=<?php echo $_smarty_tpl->tpl_vars['chr']->value;?>
&child=<?php echo $_smarty_tpl->tpl_vars['page']->value[2];?>
">下一页</a><?php }?></li>
  </ul>
</nav>      
      
      </div>
    </div>

</div>

  </body>
</html>
<?php }
}
