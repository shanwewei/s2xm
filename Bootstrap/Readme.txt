Twitter

1、跨浏览器
2、丰富的jQuery插件
3、响应式布局（最重要的特性）
	自动根据浏览器的大小调整布局
	
CDN（Content Delivery Network 内容分发网络） 内容加速服务
自动根据你的网络，选择最近的节点/最近的一台服务器提供下载/链接/认证服务！

响应式布局的实现：
	使用css3中的@media媒体查询器，实现在不同屏幕宽度尺寸下的动态样式
	见02.media.htm

响应式布局在Bootstrap中叫栅格系统Grid System

1、永远将container/container-fluid分为12列

2、每个列根据不同的@media，又细分为四种：
	超小：col-xs-*		*（1~12）	列个数
	小：col-sm-*			*（1~12）	列个数
	中：col-md-*			*（1~12）	列个数
	大：col-lg-*			*（1~12）	列个数

3、如果超过12列，那么换行，占*/12

4、
	如果你定义了col-xs，没有定义sm，md，lg，这时sm，md，lg会自动使用xs样式
	如果你定义了col-xs，sm，没有定义md，lg，这时md，lg会自动使用sm样式
	如果你定义了col-xs，sm，md，没有定义lg，这时lg会自动使用md样式
	
5、
	如果定义了大样式，没有定义小样式，那么在窗体缩小时，原有的列不管原来占多少列宽，永远独占一行
