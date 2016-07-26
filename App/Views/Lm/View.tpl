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
          <li><a href="/lm?chr={$chr}">{$res['title']}</a></li>
          <li><a href="javascript:void(0)">{$res['list'][$child]['title']}</a></li>
        </ol>  
        
<nav>
  <ul class="pagination">
    <li>{if $page[0] != ''}<a href="/lm/view?chr={$chr}&child={$page[0]}">上一页</a>{/if}</li>
    <li><a href="javascript:void(0)">{$res['list'][$page[1]]['title']}</a></li>
    <li>{if $page[2] != ''}<a href="/lm/view?chr={$chr}&child={$page[2]}">下一页</a>{/if}</li>
  </ul>
</nav> 
        
        <div id='text'>
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div id="vsdr{$smarty.foreach.foo.index}">{$nr}</div>
                  </div>
                </div>
        </div>
    
    
      
<nav>
  <ul class="pagination">
    <li>{if $page[0] != ''}<a href="/lm/view?chr={$chr}&child={$page[0]}">上一页</a>{/if}</li>
    <li><a href="javascript:void(0)">{$res['list'][$page[1]]['title']}</a></li>
    <li>{if $page[2] != ''}<a href="/lm/view?chr={$chr}&child={$page[2]}">下一页</a>{/if}</li>
  </ul>
</nav>      
      
      </div>
    </div>

</div>

  </body>
</html>
