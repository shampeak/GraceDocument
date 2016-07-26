# 类设计基本原则
> 类基本设计原则

参考网址

[link1](http://blog.163.com/zzw_007me/blog/static/3171983720104421829406/)

[link2](http://blog.csdn.net/weiwenhp/article/details/8676211)

[code project 英文版](http://www.codeproject.com/Articles/93369/How-I-explained-OOD-to-my-wife)
## 面向对象三大特性
- 封装
- 继承
- 多态

## 面向对象五大设计原则
- 开闭原则
- 单一职责原则
- 接口分隔原则
- 依赖倒置原则
- 里氏替换原则


## 开闭原则

### 基本概念
Software entities (classes, modules, function, etc.) should be open for extension, but closed for modification.

开闭原则（OCP：Open-Closed Principle）是指在进行面向对象设计（OOD：Object Oriented Design）中，设计类或其他程序单位时，应该遵循：
- 对扩展开放（open）
- 对修改关闭（closed）
的设计原则。


根据开闭原则，在设计一个软件系统模块（类，方法）的时候，应该可以在不修改原有的模块（修改关闭）的基础上，能扩展其功能（扩展开放）。

- 扩展开放：某模块的功能是可扩展的，则该模块是扩展开放的。软件系统的功能上的可扩展性要求模块是扩展开放的。

- 修改关闭：某模块被其他模块调用，如果该模块的源代码不允许修改，则该模块修改关闭的。软件系统的功能上的稳定性，持续性要求是修改关闭的。

### 好处：

1）稳定性。开闭原则要求扩展功能不修改原来的代码，这可以让软件系统在变化中保持稳定。

2）扩展性。开闭原则要求对扩展开放，通过扩展提供新的或改变原有的功能，让软件系统具有灵活的可扩展性。

遵循开闭原则的系统设计，可以让软件系统可复用，并且易于维护。

### 开闭原则的实现方法

为了满足开闭原则的 对修改关闭（closed for modification） 原则以及扩展开放（open for extension） 原则，应该对软件系统中的不变的部分加以抽象，在面向对象的设计中，

- 可以把这些不变的部分加以抽象成不变的接口，这些不变的接口可以应对未来的扩展；

- 接口的最小功能设计原则。根据这个原则，原有的接口要么可以应对未来的扩展；不足的部分可以通过定义新的接口来实现；

- 模块之间的调用通过抽象接口进行，这样即使实现层发生变化，也无需修改调用方的代码。

接口可以被复用，但接口的实现却不一定能被复用。接口是稳定的，关闭的，但接口的实现是可变的，开放的。可以通过对接口的不同实现以及类的继承行为等为系统增加新的或改变系统原来的功能，实现软件系统的柔软扩展。

简单地说，软件系统是否有良好的接口（抽象）设计是判断软件系统是否满足开闭原则的一种重要的判断基准。现在多把开闭原则等同于面向接口的软件设计。

比如定义一个抽象类,它只涉及到函数的声明,表明要实现哪些功能.而不涉及任何的细节.于是以后不用去修改它.而只修改或添加继承自这个抽象类的子类.
### 开闭原则的相对性

软件系统的构建是一个需要不断重构的过程，在这个过程中，模块的功能抽象，模块与模块间的关系，都不会从一开始就非常清晰明了，所以构建100%满足开闭原则的软件系统是相当困难的，这就是开闭原则的相对性。但在设计过程中，通过对模块功能的抽象（接口定义），模块之间的关系的抽象（通过接口调用），抽象与实现的分离（面向接口的程序设计）等，可以尽量接近满足开闭原则。
## 单一职责原则

### 基本概念

There should never be more than one reason for a class to change.永远不要让一个类存在多个改变的理由。

换句话说，如果一个类需要改变，改变它的理由永远只有一个。如果存在多个改变它的理由，就需要重新设计该类。

SRP（Single Responsibility Principle）原则的核心含意是：只能让一个类有且仅有一个职责。这也是单一职责原则的命名含义。
[Single Responsibility Principle (SRP)的原文](http://www.objectmentor.com/resources/articles/srp.pdf)
### 优点：
为什么一个类不能有多于一个以上的职责呢？

如果一个类具有一个以上的职责，那么就会有多个不同的原因引起该类变化，而这种变化将影响到该类不同职责的使用者（不同用户）：

1. 一方面，如果一个职责使用了外部类库，则使用另外一个职责的用户却也不得不包含这个未被使用的外部类库。

2. 另一方面，某个用户由于某个原因需要修改其中一个职责，另外一个职责的用户也将受到影响，他将不得不重新编译和配置。

这违反了设计的开闭原则，也不是我们所期望的。

### 职责的划分

既然一个类不能有多个职责，那么怎么划分职责呢？

Robert.C Martin给出了一个著名的定义：所谓一个类的一个职责是指引起该类变化的一个原因。

If you can think of more than one motive for changing a class, then that class has more than one responsibility.

如果你能想到一个类存在多个使其改变的原因，那么这个类就存在多个职责。

### 实例

SRP违反例：

```
Modem.java
interface Modem {
    public void dial(String pno);    //拨号
    public void hangup();        //挂断
    public void send(char c);    //发送数据
    public char recv();        //接收数据
}
```

咋一看，这是一个没有任何问题的接口设计。但事实上，这个接口包含了2个职责：第一个是连接管理（dial, hangup）；另一个是数据通信（send, recv）。很多情况下，这2个职责没有任何共通的部分，它们因为不同的理由而改变，被不同部分的程序调用。

所以它违反了SRP原则。

下面的类图将它的2个不同职责分成2个不同的接口，这样至少可以让客户端应用程序使用具有单一职责的接口：
![](http://www.uml.org.cn/mxdx/images/ShowImagez.jpg)



让ModemImplementation实现这两个接口。我们注意到，ModemImplementation又组合了2个职责，这不是我们希望的，但有时这又是必须的。通常由于某些原因，迫使我们不得不绑定多个职责到一个类中，但我们至少可以通过接口的分割来分离应用程序关心的概念。

事实上，这个例子一个更好的设计应该是这样的，如图：
![](http://www.uml.org.cn/mxdx/images/ShowImagex.jpg)

### 小结

Single Responsibility Principle (SRP)从职责（改变理由）的侧面上为我们对类（接口）的抽象的颗粒度建立了判断基准：在为系统设计类（接口）的时候应该保证它们的单一职责性。

## 接口分隔原则

### 基本概要

Clients should not be forced to depend upon interfaces that they do not use.

不能强迫用户去依赖那些他们不使用的接口。换句话说，使用多个专门的接口比使用单一的总接口总要好。

它包含了2层意思：

- 接口的设计原则：接口的设计应该遵循最小接口原则，不要把用户不使用的方法塞进同一个接口里。
如果一个接口的方法没有被使用到，则说明该接口过胖，应该将其分割成几个功能专一的接口。

- 接口的依赖（继承）原则：如果一个接口a依赖（继承）另一个接口b，则接口a相当于继承了接口b的方法，那么继承了接口b后的接口a也应该遵循上述原则：不应该包含用户不使用的方法。反之，则说明接口a被b给污染了，应该重新设计它们的关系。

### 优点
如果用户被迫依赖他们不使用的接口，当接口发生改变时，他们也不得不跟着改变。换而言之，一个用户依赖了未使用但被其他用户使用的接口，当其他用户修改该接口时，依赖该接口的所有用户都将受到影响。这显然违反了开闭原则，也不是我们所期望的。

### 实例
下面我们举例说明怎么设计接口或类之间的关系，使其不违反ISP原则。

假如有一个Door，有lock，unlock功能，另外，可以在Door上安装一个Alarm而使其具有报警功能。用户可以选择一般的Door，也可以选择具有报警功能的Door。

有以下几种设计方法：

ISP原则的违反例：

方法一：

在Door接口里定义所有的方法。图：
![](http://www.uml.org.cn/mxdx/images/ShowImagec.jpg)

类的设计原则 - zzw_007me - 我的问题博客

但这样一来，依赖Door接口的CommonDoor却不得不实现未使用的alarm()方法。违反了ISP原则。

方法二：

在Alarm接口定义alarm方法，在Door接口定义lock，unlock方法，Door接口继承Alarm接口。

![](http://www.uml.org.cn/mxdx/images/ShowImagev.jpg)

跟方法一一样，依赖Door接口的CommonDoor却不得不实现未使用的alarm()方法。违反了ISP原则。

遵循ISP原则的例：

方法三：通过多重继承实现
![](http://www.uml.org.cn/mxdx/images/ShowImageb.jpg)

在Alarm接口定义alarm方法，在Door接口定义lock，unlock方法。接口之间无继承关系。CommonDoor实现Door接口，

AlarmDoor有2种实现方案：

1），同时实现Door和Alarm接口。

2），继承CommonDoor，并实现Alarm接口。该方案是继承方式的Adapter设计模式的实现。

第2）种方案更具有实用性。

这种设计遵循了ISP设计原则。

方法四：通过委让实现

![](http://www.uml.org.cn/mxdx/images/ShowImagen.jpg)

这种方法其实是委让方式的Adapter设计模式的实现。

在这种方法里，AlarmDoor实现了Alarm接口，同时把功能lock和unlock委让给CommonDoor对象完成。

这种设计遵循了ISP设计原则。

### 小结

Interface Segregation Principle (ISP)从对接口的使用上为我们对接口抽象的颗粒度建立了判断基准：在为系统设计接口的时候，使用多个专门的接口代替单一的胖接口。

## 依赖倒置原则

### 基本概念

A. High level modules should not depend upon low level modules. Both should depend upon abstractions.

B. Abstractions should not depend upon details. Details should depend upon abstractions.

中文意思为：

A. 高层模块不应该依赖于低层模块，二者都应该依赖于抽象

B. 抽象不应该依赖于细节，细节应该依赖于抽象

概念解说：

依赖：在程序设计中，如果一个模块a使用/调用了另一个模块b，我们称模块a依赖模块b。

高层模块与低层模块：往往在一个应用程序中，我们有一些低层次的类，这些类实现了一些基本的或初级的操作，我们称之为低层模块；另外有一些高层次的类，这些类封装了某些复杂的逻辑，并且依赖于低层次的类，这些类我们称之为高层模块。

为什么叫做依赖倒置（Dependency Inversion）呢？

面向对象程序设计相对于面向过程（结构化）程序设计而言，依赖关系被倒置了。因为传统的结构化程序设计中，高层模块总是依赖于低层模块。

### 优点：
Robert C. Martin氏在原文中给出了“Bad Design”的定义：

1. It is hard to change because every change affects too many other parts of the system.

(Rigidity)

系统很难改变，因为每个改变都会影响其他很多部分。

2. When you make a change, unexpected parts of the system break. (Fragility)

当你对某地方做一修改，系统的看似无关的其他部分都不工作了。

3. It is hard to reuse in another application because it cannot be disentangled from

the current application. (Immobility)

系统很难被另外一个应用重用，因为你很难将要重用的部分从系统中分离开来。

导致“Bad Design”的很大原因是“高层模块”过分依赖“低层模块”。

一个良好的设计应该是系统的每一部分都是可替换的。

如果“高层模块”过分依赖“低层模块”，一方面一旦“低层模块”需要替换或者修改，“高层模块”将受到影响；另一方面，高层模块很难可以重用。

比如，一个Copy模块，需要把来自Keyboard的输入复制到Print，即使对Keyboard和Print的封装已经做得非常好，但如果Copy模块里直接使用Keyboard与Print，Copy任很难被其他应用环境（比如需要输出到磁盘时）重用。

问题的解决：

为了解决上述问题，Robert C. Martin氏提出了OO设计的Dependency Inversion Principle (DIP) 原则。

DIP给出了一个解决方案：在高层模块与低层模块之间，引入一个抽象接口层。

High Level Classes（高层模块） --> Abstraction Layer（抽象接口层） --> Low Level Classes（低层模块）

抽象接口是对低层模块的抽象，低层模块继承或实现该抽象接口。

这样，高层模块不直接依赖低层模块，高层模块与低层模块都依赖抽象接口层。

当然，抽象也不依赖低层模块的实现细节，低层模块依赖（继承或实现）抽象定义。

简单理解，在编程中就是假如有类AA与BB,而类AA与BB互相依赖,于是比较好的方法就是把AA抽象出来一个A,BB抽象出来一个B,这样就变成A,B互相依赖了.另外AA要依赖A,继承自它并实现具体细节嘛.

Robert C. Martin氏给出的DIP方案的类的结构图：
![](http://www.uml.org.cn/mxdx/images/ShowImagem.jpg)


PolicyLayer-->MechanismInterface(abstract)--MechanismLayer-->UtilityInterface(abstract)--UtilityLayer

类与类之间都通过Abstract Layer来组合关系。


## 里氏替换原则
### 基本概念

Functions that use pointers or references to base classes must be able to use objects of derived classes without knowing it.

所有引用基类的地方必须能透明地使用其子类的对象。也就是说，只有满足以下2个条件的OO设计才可被认为是满足了LSP原则：

- 不应该在代码中出现if/else之类对子类类型进行判断的条件。以下代码就违反了LSP定义。


```
if (obj typeof Class1) {
do something
} else if (obj typeof Class2) {
do something else
}
```


- 子类应当可以替换父类并出现在父类能够出现的任何地方，或者说如果我们把代码中使用基类的地方用它的子类所代替，代码还能正常工作。

里氏替换原则LSP是使代码符合开闭原则的一个重要保证。同时LSP体现了：

- 类的继承原则：如果一个继承类的对象可能会在基类出现的地方出现运行错误，则该子类不应该从该基类继承，或者说，应该重新设计它们之间的关系。

- 动作正确性保证：从另一个侧面上保证了符合LSP设计原则的类的扩展不会给已有的系统引入新的错误。

类的继承原则：

Robert C. Martin氏在介绍Liskov Substitution Principle (LSP)的原文里，举了Rectangle和Square的例子。这里沿用这个例子，但用Java语言对其加以重写，并忽略了某些细节只列出下面的精要部分来说明 里氏替换原则 对类的继承上的约束。

### 优点
![](http://www.uml.org.cn/mxdx/images/dfgwwww.jpg)
这里Rectangle是基类，Square从Rectangle继承。

这种继承关系有什么问题吗？

假如已有的系统中存在以下既有的业务逻辑代码：


```
void g(Rectangle r) {
r.setWidth(5);
r.setHeight(4);
if (r.getWidth() * r.getHeight() != 20) {
throw new RuntimeException();
}
}
```


则对应于扩展类Square，在调用既有业务逻辑时：


```
Rectangle square = new Square();
g(square);
```


时会抛出一个RuntimeException异常。这显然违反了LSP原则。

动作正确性保证：

因为LSP对子类的约束，所以为已存在的类做扩展构造一个新的子类时，根据LSP的定义，不会给已有的系统引入新的错误。

Design by Contract

根据Bertrand Meyer氏提出的Design by Contract（DBC：基于合同的设计）概念的描述，对于类的一个方法，都有一个前提条件以及一个后续条件，前提条件说明方法接受什么样的参数数据等，只有前提条件得到满足时，这个方法才能被调用；同时后续条件用来说明这个方法完成时的状态，如果一个方法的执行会导致这个方法的后续条件不成立，那么这个方法也不应该正常返回。

现在把前提条件以及后续条件应用到继承子类中，子类方法应该满足：

1）前提条件不强于基类．

2）后续条件不弱于基类．

换句话说，通过基类的接口调用一个对象时，用户只知道基类前提条件以及后续条件。因此继承类不得要求用户提供比基类方法要求的更强的前提条件，亦即，继承类方法必须接受任何基类方法能接受的任何条件（参数）。同样，继承类必须顺从基类的所有后续条件，亦即，继承类方法的行为和输出不得违反由基类建立起来的任何约束，不能让用户对继承类方法的输出感到困惑。

这样，我们就有了基于合同的LSP，基于合同的LSP是LSP的一种强化。

在很多情况下，在设计初期我们类之间的关系不是很明确，LSP则给了我们一个判断和设计类之间关系的基准：需不需要继承，以及怎样设计继承关系。



***@editor： siluzhou***
