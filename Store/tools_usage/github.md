# github
> github 使用介绍 



## github ignore文件

gitignore文件

.gitignore顾名思义就是告诉git需要忽略的文件，这是一个很重要并且很实用的文件。一般我们写完代码后会执行编译、调试等操作，这期间会产生很多中间文件和可执行文件，这些都不是代码文件，是不需要git来管理的。我们在git status的时候会看到很多这样的文件，如果用git add -A来添加的话会把他们都加进去，而手动一个个添加的话也太麻烦了。这时我们就需要.gitignore了。



### 文件.gitignore的格式规范：

- /#为注释
- 可以使用shell所使用的正则表达式来进行模式匹配 
- 匹配模式最后跟"/"说明要忽略的是目录
- 使用！取反（例如目录中包含  test.a，并且gitignore文件中包含  *.[oa]，如果在文件中加入 ！test.a  表明忽略除test.a文件以外的后缀名为.a或者.o的文件）
- 忽略vendor文件夹，只需要在ignore中加上
```
vendor
```
即可

### 忽略文件的原则是：

- 忽略操作系统自动生成的文件，比如缩略图等；
- 忽略编译生成的中间文件、可执行文件等，也就是如果一个文件是通过另一个文件自动生成的，那自动生成的文件就没必要放进版本库，比如Java编译产生的.class文件；
- 忽略你自己的带有敏感信息的配置文件，比如存放口令的配置文件。

最后一步就是把.gitignore也提交到Git，就完成了！当然检验.gitignore的标准是git status命令是不是说working directory clean。
### 实例
使用Windows的童鞋注意了，如果你在资源管理器里新建一个.gitignore文件，它会非常弱智地提示你必须输入文件名，但是在文本编辑器里“保存”或者“另存为”就可以把文件保存为.gitignore了。

有些时候，你想添加一个文件到Git，但发现添加不了，原因是这个文件被.gitignore忽略了：

```
$ git add App.class
The following paths are ignored by one of your .gitignore files:
App.class
Use -f if you really want to add them.
```

如果你确实想添加该文件，可以用-f强制添加到Git：

```
$ git add -f App.class
```
或者你发现，可能是.gitignore写得有问题，需要找出来到底哪个规则写错了，可以用git check-ignore命令检查：

```
$ git check-ignore -v App.class
.gitignore:3:*.class    App.class
```
Git会告诉我们，.gitignore的第3行规则忽略了该文件，于是我们就可以知道应该修订哪个规则。

## github release
### 定义
Releases are first-class objects with changelogs and binary assets that present a full project history beyond Git artifacts. 
### 新建release
- 点击进入仓库主页
- 点击release
- 点击draft a new release，添加tag（尽量满足SemVer要求），点击发布or预发布

### 编辑release

- On GitHub, navigate to the main page of the repository.
- Releases tabUnder your repository name, click Releases.
- Release edit buttonOn the Releases page, to the right of the release you want to edit, click Edit.
- On the Release edit page, you can:
    - Select a new tag from the tag dropdown.
    - Edit the release's title.
    - Edit the release's description.
    - Add a binary file.
    - Mark the release as a pre-release.
    
### 删除release

-   On GitHub, navigate to the main page of the repository.

-   Releases tabUnder your repository name, click Releases.

-   ==Release name linkOn the Release page, click the name of the release you wish to delete.==
    Release delete buttonIn the upper-right corner of the page, click Delete.（只有再点击版本号后才会出现删除键，否则只有编辑键）

## protected branch

GitHub新推出的这一功能，对多人协作项目非常有用。

管理员可以开启该功能，一旦开启，被保护的分支：
* 无法强制推送
* 无法被删除
* 只有测试全部通过才被接受合并

添加方法：

工程名——settings——Branches——protected branches——choose a branch

***@editor siluzhou***
