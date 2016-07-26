# UML类图
> UML类图

**参考网址**

[link1](http://www.open-open.com/lib/view/open1328059700311.html)

[link2](http://blog.csdn.net/xhf55555/article/details/6896316/)

[link3](http://www.uml.org.cn/oobject/201104212.asp)

[link4](http://blog.csdn.net/lovelion/article/details/7843308)

## 定义
类图是面向对象系统建模中最常用和最重要的图，是定义其它图的基础。类图主要是用来显示系统中的类、接口以及它们之间的静态结构和关系的一种静态模型。

### 基本组件
类图的3个基本组件：类名、属性、方法。
![](http://hi.csdn.net/attachment/201110/11/0_1318335114Q946.gif)

“动物”矩形框，它代表一个类。该类图分为三层，第一层显示类的名称，如果是抽象类就要用斜体显示。第二层是类的特性，通常就是字段和属性。第三层是类的操作，通常是方法和行为。

   注意前面的符号，‘+’表示public, ‘—’ 表示private, ‘#’表示protected. 
   
![](http://hi.csdn.net/attachment/201110/11/0_1318335121ms0F.gif) ![](http://hi.csdn.net/attachment/201110/11/0_1318335121ms0F.gif)

飞翔”矩形框表示一个接口图，它与类图的区别主要是顶端有《interface》显示，第一行是接口名称，第二行是接口方法。接口还有另一种表示方法，俗称棒棒糖表示法，就是唐老鸭类实现了“讲人话”的接口。
## 基本关系
- 泛化（Generalization）
- 实现（Realization）
- 关联（Association)
- 聚合（Aggregation）
- 组合(Composition)
- 依赖(Dependency)

## 泛化
### 定义
是一种继承关系，表示一般与特殊的关系，它指定了子类如何特化父类的所有特征和行为。例如：老虎是动物的一种，即有老虎的特性也有动物的共性。
### 箭头

带三角箭头的实线，箭头指向父

![](http://static.open-open.com/lib/uploadImg/20120201/20120201092740_578.gif)

## 实现（Realization）
### 定义
是一种类与接口的关系，表示类是接口所有特征和行为的实现.

### 箭头
带三角箭头的虚线，箭头指向接口
![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_47.gif)

## 组合(Composition)
### 定义：
是整体与部分的关系，但部分不能离开整体而单独存在。如公司和部门是整体和部分的关系，没有公司就不存在部门。成员对象与整体对象之间同生共死

组合关系是关联关系的一种，是比聚合关系还要强的关系，它要求普通的聚合关系中代表整体的对象负责代表部分的对象的生命周期。

### 代码实现
代码实现组合关系时，通常在整体类的构造方法中直接实例化成员类

```
public class Head {
	private Mouth mouth;

	public Head() {
		mouth = new Mouth(); //实例化成员类
	}
……
}

public class Mouth {
	……
}
```

### 箭头
带实心菱形的实线，菱形指向整体

![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_278.gif)

## 聚合（Aggregation）
### 定义  
是整体与部分的关系，且部分可以离开整体而单独存在。如车和轮胎是整体和部分的关系，轮胎离开车仍然可以存在。

聚合关系是关联关系的一种，是强的关联关系；关联和聚合在语法上无法区分，必须考察具体的逻辑关系。
### 代码实现
在代码实现聚合关系时，成员对象通常作为构造方法、Setter方法或业务方法的参数注入到整体对象中

```
public class Car {
	private Engine engine;

    //构造注入
	public Car(Engine engine) {
		this.engine = engine;
	}
    
    //设值注入
public void setEngine(Engine engine) {
    this.engine = engine;
}
……
}

public class Engine {
	……
}
```
   
### 箭头
带空心菱形的实心线，菱形指向整体
![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_681.gif)

## 关联（Association)
### 定义        
关联(Association)关系是类与类之间最常用的一种关系，它是一种结构化关系，用于表示一类对象与另一类对象之间有联系，如汽车和轮胎、师傅和徒弟、班级和学生等等是一种拥有的关系，它使一个类知道另一个类的属性和方法；老师与学生，丈夫与妻子关联可以是双向的，也可以是单向的。双向的关联可以有两个箭头或者没有箭头，单向的关联有一个箭头。

### 箭头
带普通箭头的实心线，指向被拥有者

### 实现方式
通常将一个类的对象作为另一个类的成员变量

```
public class Customer {
private Product[] products;
……
}

public class Product {
private Customer customer;
……
}
```


![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_41.gif)

上图中，老师与学生是双向关联，老师有多名学生，学生也可能有多名老师。但学生与某课程间的关系为单向关联，一名学生可能要上多门课程，课程是个抽象的东西他不拥有学生。 

下图为自身关联： 
![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_335.gif)

## 依赖(Dependency)
### 定义
是一种使用的关系，即一个类的实现需要另一个类的协助，所以要尽量不使用双向的互相依赖.

### 代码表现
局部变量、方法的参数或者对静态方法的调用，某个类的方法使用另一个类的对象作为参数

```
public class Driver {
	public void drive(Car car) {
		car.move();
	}
    ……
}

public class Car {
	public void move() {
		......
	}
    ……
}
```

### 箭头及指向
带箭头的虚线，指向被使用者、
![](http://static.open-open.com/lib/uploadImg/20120201/20120201092741_129.gif)



## UML类图几种关系的总结 

### 聚合与组合区别

这两个比较难理解，重点说一下。聚合和组合的区别在于：聚合关系是“has-a”关系，组合关系是“contains-a”关系；聚合关系表示整体与部分的关系比较弱，而组合比较强；聚合关系中代表部分事物的对象与代表聚合事物的对象的生存期无关，一旦删除了聚合对象不一定就删除了代表部分事物的对象。组合中一旦删除了组合对象，同时也就删除了代表部分事物的对象。 
### 各种关系的强弱顺序：

泛化= 实现 > 组合 > 聚合 > 关联 > 依赖 

实线三角 虚线三角 实线菱形 虚线菱形 实线箭头 虚线箭头 

关系由强到弱|表示由实到虚
---|---
泛化|实线三角 
实现 |虚线三角
组合 |实线菱形
聚合 |虚线菱形
关联 |实线箭头
依赖 |虚线箭头

下面这张UML图，比较形象地展示了各种类图关系：

![](http://static.open-open.com/lib/uploadImg/20120201/20120201092742_482.png)