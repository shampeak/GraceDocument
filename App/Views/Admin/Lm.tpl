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
    <td>{$info['sort']}</td>
  </tr>
  <tr>
    <td>chr</td>
    <td>{$info['chr']}</td>
  </tr>
  <tr>
    <td>title</td>
    <td>{$info['title']}</td>
  </tr>
  <tr>
    <td>des</td>
    <td>{$info['des']}</td>
  </tr>
  <tr>
    <td>path</td>
    <td>{$info['path']}</td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
      <input name="chr" type="hidden" value="{$chr}">
      <input name="title" type="hidden" value="{$info['title']}">
      <input name="description" type="hidden" value="{$info['description']}">
      <input name="type" type="radio" value="0" {if $res['type']!=1}checked{/if}>
      收起
      <input type="radio" name="type" value="1" {if $res['type']==1}checked{/if}>
      展开

<table width="99%" border="1">
  <tr>
    <td height="30">序号</td>
    <td height="30">chr</td>
    <td>title</td>
    <td>des</td>
  </tr>
  {foreach from=$res['list'] key=key item=value name=foo}
  <tr>
    <td height="30"><input name="list[{$key}][sort]" type="text" value="{$smarty.foreach.foo.index}" size="5" maxlength="5"></td>
    
    <td height="30"><input type="hidden" name="list[{$key}][chr]" value="{$value['chr']}">
      <a href='/admin/lm/?chr={$value['chr']}'>{$value['chr']}</a></td>
    <td><input type="text" name="list[{$key}][title]" value="{$value['title']}"></td>
    <td><input name="list[{$key}][des]" type="text" size="60" maxlength="60" value="{$value['des']}"></td>
  </tr>
  {/foreach}
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
</html>