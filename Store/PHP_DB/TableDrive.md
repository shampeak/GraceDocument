# 表驱动
> 表驱动的概念以及使用

**参考网址**

[百度百科](http://baike.baidu.com/link?url=Qf-Y14Ym_Mrqly5BykTgyDnNcerT0gjEvEW3oB2b2gn3THJxs9ZiPllVDITXD0FmMleLqpabKo9X3g3YewG88a)

[link1](http://www.cnblogs.com/jerry19880126/archive/2012/12/16/2820644.html)


## 概念
表驱动法是一种编程模式，从表里面查询信息而不使用逻辑语句（如if或switch）    

事实上，任何信息都可以通过表来挑选。在简单的情况下，逻辑语句往往更简单而且更直接。但随着逻辑链的复杂，表就变得越来越富有吸引力了

（zz from 《代码大全》）

例如，假设需要一个可以返回每个月中天数的函数（为简单起见不考虑闰年），
一个比较笨的方法是一个大的if语句，或者switch语句。这样子写出的代码非常冗余。一个简单的方法是使用表驱动法。
：

```
staticintaiMonthDays[12]={31,28,31,30,31,30,31,31,30,31,30,31};
// 我们可以先定义一个静态数组，这个数组用来保存一年十二个月的天数
intiGetMonthDays(intiMonth)
{
    returnaiMonthDays[(iMonth-1)；
}
```
## 查询数据方式

### 直接访问(Direct Access)
直接访问是最简单的，查表本质其实就是去索引“键”来获得“值”，有点像获得数组值一样，给定下标index，然后matrix[index]就获得数组在相应下标处的数值，再如前面的return totalDayTable[month - 1]就是直接用month-1来作为键的，而值可以直接通过查表来获得。

### 索引访问（Index Access）
它适用于这样的情况，假设你经营一家商店，有100种商品，每种商品都有一个ID号，但很多商品的描述都差不多，所以只有30条不同的描述，现在的问题是建立商品与商品描述的表，如何建立？还是同上面做法来一一对应吗？那样描述会扩充到100的，会有70个描述是重复的！如何解决这个问题呢？方法是建立一个100长的索引，然后这些索引指向相应的描述，注意不同的索引可以指向相同的描述，这样就解决了表数据冗余的问题啦。
### 阶梯访问(Stair-Step Access)
它适用于数据不是一个固定的值，而是一个范围的问题，比如将百分制成绩转成五级分制（我们用的优、良、中、合格、不合格，西方用的A、B、C、D和F），假定转换关系是当成绩在90-100区间，判为A，成绩在80-90区间，判为B，成绩在70-80区间，判为C，成绩在60-70区间，判为D，成绩在60以下，判为F（failure）。现在的问题是，怎么用表格对付这个范围问题？一种笨笨的方法是申请一个100长的表，然后在这个表中填充相应的等级就行了，但这样太浪费空间了，有没有更好的方法？

## 函数指针在表驱动方法中的应用
在使用表驱动方法时需要说明的一个问题是，你将在表中存储些什么。

在某些情况下，表查寻的结果是数据。如果是这种情况，你可以把数据存储在表中。

在其它情况下，表查寻的结果是动作。在这种情况下，你可以把描述这一动作的代码存储在表中。

在某些语言中，也可以把实现这一动作的子程序的调用存储在表中，也就是将函数的指针保存在表中，当查找到这项时，让程序用这个函数指针来调用相应的程序代码，这个就是函数指针在表驱动方法中的应用。

其实说到这已经说了很多表驱动方法的相关问题了，现在要把函数指针也应用进去，很多人应该已经想到会是个什么样子了，其实也很简单，通过下面这两段伪代码的例子就可以充分体现函数指针在表驱动方法中应用会使代码更加精致。

我们在写一段程序的过程中会经常遇到这样的问题，我们在写一个Task的主函数中有时会要等待不同的Event通知，并且处理不同的分支，首先有如下的Event Bit的宏定义和相应的处理函数的声明。


```
#define TASK_EVENT_BIT00 (1<<0)
#define TASK_EVENT_BIT01 (1<<1)
#define TASK_EVENT_BIT02 (1<<2)
#define TASK_EVENT_BIT03 (1<<3)
#define TASK_EVENT_BIT04 (1<<4)
#define TASK_EVENT_BIT05 (1<<5)
#define TASK_EVENT_BIT06 (1<<6)
#define TASK_EVENT_BIT07 (1<<7)
#define TASK_EVENT_BIT08 (1<<8)
#define TASK_EVENT_BIT09 (1<<9)
void vDoWithEvent00 ();
void vDoWithEvent01();
void vDoWithEvent02();
void vDoWithEvent03();
void vDoWithEvent04();
void vDoWithEvent05();
void vDoWithEvent06();
void vDoWithEvent07();
void vDoWithEvent08();
void vDoWithEvent09();
```


我们一般首先想到的写法是


```
unsigned long ulEventBit;
for(;;)
{
    xos_waitFlag(&ulEventBit);
    if(ulEventBit&TASK_EVENT_BIT00) {
        vDoWithEvent00();
    }
    if(ulEventBit&TASK_EVENT_BIT01) {
        vDoWithEvent01();
    }
    if(ulEventBit&TASK_EVENT_BIT02) {
        vDoWithEvent02();
    }
    if(ulEventBit&TASK_EVENT_BIT03) {
        vDoWithEvent03();
    }
    if(ulEventBit&TASK_EVENT_BIT04) {
        vDoWithEvent04();
    }
    if(ulEventBit&TASK_EVENT_BIT05) {
        vDoWithEvent05();
    }
    if(ulEventBit&TASK_EVENT_BIT06) {
        vDoWithEvent06();
    }
    if(ulEventBit&TASK_EVENT_BIT07) {
        vDoWithEvent07();
    }
    if(ulEventBit&TASK_EVENT_BIT08) {
        vDoWithEvent08();
    }
    if(ulEventBit&TASK_EVENT_BIT09) {
        vDoWithEvent09();
    }
}
```


可以看出这样写是不是显得程序太长了呢。

下面我们再看看同样的一段代码用函数指针和表驱动方法结合的方法写出会是什么样子。

```
typedef struct {
    unsigned long ulEventBit;
    void(*Func)(void);
}EventDoWithTable_t;/*定义EventBit与相应处理函数关系的结构体*/
staticconstEventDoWithTable_tastDoWithTable[]={
    {TASK_EVENT_BIT00,vDoWithEvent00},
    {TASK_EVENT_BIT01,vDoWithEvent01},
    {TASK_EVENT_BIT02,vDoWithEvent02},
    {TASK_EVENT_BIT03,vDoWithEvent03},
    {TASK_EVENT_BIT04,vDoWithEvent04},
    {TASK_EVENT_BIT05,vDoWithEvent05},
    {TASK_EVENT_BIT06,vDoWithEvent06},
    {TASK_EVENT_BIT07,vDoWithEvent07},
    {TASK_EVENT_BIT08,vDoWithEvent08},
    {TASK_EVENT_BIT09,vDoWithEvent09}
};
    /*建立EventBit与相应处理函数的关系表*/
    ulongulEventBit;
    inti ;
    for(;;){
        xos_waitFlag(&ulEventBit);
        for(i=0;i<sizeof(astDoWithTable)/sizeof(astDoWithTable[0]);i++){
            if((ulEventBit&astDoWithTable[i].ulEventBit)&&(astDoWithTable[i].Func!=NULL)){
                (*astDoWithTable[i].Func)();
                    /*通过函数指针来调用相应的处理函数*/
            }
        }
    }
```


可以看出这种代码的风格使代码变得精致得多了，并且使程序的灵活性大大加强了，如果我们还要再加入EventBit，只修改表中的内容就可以了。
## 表驱动法优点
- 在适当环境下，使用它能够使代码简单、明了。
- 修改容易（易维护）、效率更高。
- 表驱动法的一个好处就是能够大量消除代码中if  else， swith 判断。