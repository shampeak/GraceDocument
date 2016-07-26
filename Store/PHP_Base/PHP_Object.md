# 对象基础
> PHP面向对象基础

## 定义
### 对象属性

类的属性可以是public,protected或private，可见性关键字在PHP5中引入，如果在PHP4下将无法正常工作。

用->字符连接对象变量和属性名来访问属性变量，例如
```
$product = new shopproduct();
print $product->title;
```
也可以用这种方法设置属性值，但是会带来问题，因为PHP允许动态设置属性，如果拼错属性或忘记属性名时不会得到警告。

### 方法
1. PHP方法中$this伪变量把类指向一个对象实例。在理解中可以尝试用“当前实例”替换$this
2.  PHP中，定义方法和函数不需要指定参数的数据类型，可以带来灵活性，也有可能引起歧义。为了解决这个歧义，需要在 检测类型、转换类型、依赖良好清晰的文档中仔细权衡。
3.  类型提示：用于处理方法参数类型设置的问题：
- PHP5有对类的类型提示，增加一个方法参数的类型提示，只需简单将类名放在需要约束的方法参数之前。
```
public function write(Product $product){
}
```
- 其他数据类型，例如字符串和整型，可以用is_int这样子的类型检查函数。但是可以强制规定用数组
```
function setArray(array $myarray) {
}
```

### 继承
1. 创建一个子类需要在类中extends关键字
2. 子类默认继承父类所有的public和protected方法，但是没有继承private方法或者属性。
3. 在子类中调用父类的方法，可以用::而不是->
```
parent::_construct();
```
意思是调用父类的构造方法
4. 覆写一个父类的方法时，我们并不希望删除父类的功能，而是扩展它，通过在当前对象中调用父类方法达到这个目的，然后再此基础上添加，可以避免重复开发

### 管理类的访问
1. 属性
- public:任何地方
- protected: 当前类与子类
- private: 当前类，子类也不能
2. 访问方法：不要允许直接访问属性，而是通过getter与setter方法访问属性

