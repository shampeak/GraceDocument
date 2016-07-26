
使用
```
$vo = Grace\Vo\Vo::getInstance('../App/');
\print_r($vo->FileReflect);          //表分离
print_r($vo->Providers);            //表分离
print_r($vo->ObjectConfig);         //配置内容
```


 * var_dump(Grace\Vo\Vo::getInstance()->make('db'));          //单例访问 [实例化]
 * Grace\Vo\Vo::getInstance()->make('db')->test();
 * //var_dump($vo);
```
app('pdo')->test();
Grace\Vo\Vo::getInstance()->make('pdo')->test();
```