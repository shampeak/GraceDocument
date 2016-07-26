<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$res['description']}">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>{$res['title']}</title>
   
    <!-- Bootstrap -->
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <li><a href="javascript:void(0)">{$res['title']}</a></li>
        </ol>  
        
        
        
        <div id='text'>
            {foreach from=$list key=key item=value name=foo}
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div id="vsdr{$smarty.foreach.foo.index}">{$nr[$value['chr']]}</div>
                  </div>
                </div>
            {/foreach}
        </div>
    
    
      </div>
    </div>



</div>
    <script src="/assets/jquery-1.11.1.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
  </body>
</html>
