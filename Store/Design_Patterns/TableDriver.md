# 表驱动
> 表驱动

**参考网址**

[link1](http://blog.sina.com.cn/s/blog_6002b970010174lz.html)

[link2](http://www.cnblogs.com/jerry19880126/archive/2012/12/16/2820644.html)

[link3]()

[link4]()

## 定义
表驱动法是一种编程模式，从表里面查询信息而不使用逻辑语句（如if或switch）

适当运用表驱动法可以精简程序，所谓表驱动，就是把程序中的复杂逻辑用查表的方式来替代，从而达到更好的效率。

## 实例
如果有这样一个函数int getTotalDayInMonth(int month)，它输入一个月份，然后返回这个月份的总天数（不考虑润年，二月以28天计），比如输入5，返回的是31，因为5月里共有31天。一种写法是用if/else 或者switch，另一种是用表驱动

```
const int totalDayTable[12] =
{
    31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31
};

// 获得某一月中的总天数，monthIndex从 1 开始
int getTotalDayInMonthFromTable(int month)
{
    return totalDayTable[month - 1];
}
```

表驱动的优点：
1. 把用表与不用表的代码对比一下，用表的代码大大简化
2. 可读性高
2. 容易修改与扩充：如果某个天数变了，可以直接修改或扩充totalDayTable就行了，至于函数则分毫不用修改。

## 表驱动分类

### 1. 直接访问
直接访问是最简单的，查表本质其实就是去索引“键”来获得“值”，有点像获得数组值一样，给定下标index，然后matrix[index]就获得数组在相应下标处的数值，再如前面的return totalDayTable[month - 1]就是直接用month-1来作为键的，而值可以直接通过查表来获得。
### 2. 索引访问

假设你经营一家商店，有100种商品，每种商品都有一个ID号，但很多商品的描述都差不多，所以只有30条不同的描述，现在的问题是建立商品与商品描述的表，如何建立？还是同上面做法来一一对应吗？那样描述会扩充到100的，会有70个描述是重复的！如何解决这个问题呢？方法是建立一个100长的索引，然后这些索引指向相应的描述，注意不同的索引可以指向相同的描述，这样就解决了表数据冗余的问题啦。

### 3. 阶梯访问
第三种表驱动法是阶梯访问表，它适用于数据不是一个固定的值，而是一个范围的问题，比如将百分制成绩转成五级分制（我们用的优、良、中、合格、不合格，西方用的A、B、C、D和F），假定转换关系是当成绩在90-100区间，判为A，成绩在80-90区间，判为B，成绩在70-80区间，判为C，成绩在60-70区间，判为D，成绩在60以下，判为F（failure）。现在的问题是，怎么用表格对付这个范围问题？一种笨笨的方法是申请一个100长的表，然后在这个表中填充相应的等级就行了，但这样太浪费空间了，有没有更好的方法？

```
//阶梯访问表，顺序查找
const char gradeTable[] = {
    'A', 'B', 'C', 'D', 'F'
};

const int downLimit[] = {
    90, 80, 70, 60
};

int main()
{
    int score = 87;
    int gradeLevel = 0;
    while(gradeTable[gradeLevel] != 'F')
    {
        if(score < downLimit[gradeLevel])
        {
            ++ gradeLevel;
        }
        else
        {
            break;
        }
    }
    cout << "等级为 " << gradeTable[gradeLevel] << endl;
    return 0;
}
```




***@editor: siluzhou***












