# slwc
A 'online judge' system.

通信工程2016级，共青团活动，答题自动判断、排名系统。

使用了bootstrap构建页面，后端[Mr.K](https://github.com/MrDxxK)神奇地不用SQL，而用php+C++做了一个“数据库”。毕竟这个还是太简单。毕竟toy。

`index.html`是答题的主页面，`right.html`是答对页面，`wrong.html`是答错页面，`did_answered.html`是已经回答正确而继续提交返回的页面，`ranklist.html`是排行榜的模板，实际由`ranklist.php`生成返回的页面。

原来使用了菜鸟教程的css，js库。由于本地测试时出现了访问异常，于是下载下来本地访问。

`myjs.js`是手写的一部分js。

## local_data
这里储存了题目，以及提交记录等类似于数据库的东西。

`Qustion_Data...`储存了题目以及相应的答案。文件名为什么这么长请咨询[Mr.K](https://github.com/MrDxxK)。

`Students_Template.json`是一个模板，可以记录每个学生的每道题是否答对，以及用于生成`ranklist.html`的相关信息，排名、分数。每个学生有一个`学号.json`。

`Connection.log`记录所有提交信息。

`RankList_Init`是一个可执行文件，从每个学生的json读取数据处理成html的表格形式，结果被`ranklist.php`处理到`ranklist.html`的模板中。

***

> 学全栈，找Mr.K。 --sdlyyxy
