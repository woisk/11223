<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// 后台登录
Route::get('/admin/login', 'AdminController@login');
Route::get('/admin/logout', 'AdminController@logout');
Route::post('/admin/login', 'AdminController@dologin');


// 网站维护状态
Route::group(['middleware'=>'weihu'],function(){
// 前台首页
Route::get('/','LoginController@index');
// 网站公告
Route::get('/article/{id}','ArticlesController@detail')->where('id','\d+');
Route::get('/article','ArticlesController@list');
// 前台用户注册
Route::get('/register','LoginController@register');
Route::post('/register','LoginController@doregister');

// 前台用户登录
Route::get('/login','LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/login','LoginController@login');
Route::post('/login','LoginController@dologin');
// 前台搜索
Route::get('/s','SousuoController@sousuo');


// 找回密码
Route::get('/forget','LoginController@forget');
Route::post('/forget','LoginController@doforget');
// 重置密码
Route::get('/reset','LoginController@reset');
Route::post('/reset','LoginController@doreset');
// 邮箱激活
Route::get('/active','LoginController@active');
//前台商品列表
Route::get('/list','ListController@list');
// 商品详情 1.html
Route::get('/course/{id}','CourseController@detail')->where('id','\d+');




// 前台权限控制
Route::group(['middleware'=>'homelogin'],function(){
    //商品收藏
    Route::get('/user/favorite','GoodsController@favorite');
    //收藏列表
    Route::get('/user/favorite/list','GoodsController@list');
    //取消收藏
    Route::get('/user/nofavorite','GoodsController@nofavorite');
    // 加入到购物车
    Route::post('/cart/add','CartController@add');
    // 购车显示
    Route::get('/cart','CartController@index');
    // 购物车商品删除
    Route::get('/cart/del','CartController@del');
    // 购物车清空 delModel
    Route::get('/cart/delModel','CartController@delModel');
    // 订单创建
    Route::post('/order/add','OrderController@add');
    // 订单确认
    Route::get('/order/confirm','OrderController@confirm');
    // 确认付款
    Route::post('/order/confirm','OrderController@doconfirm');
    // 支付成功
    Route::get('/success','OrderController@success');

    // 个人中心
    Route::get('/user','UserCenterController@index');
    // 头像上传
    Route::get('/user/profile','UserCenterController@profile');
    Route::post('/user/profile','UsercenterController@doprofile');
    // 个人资料
    Route::get('/user/info','InfoController@info');
    // 修改个人资料
    Route::post('/user/info/editdetail','InfoController@doinfo');
    //修改密码页面
    Route::get('/user/info/edit','PasswordController@edit');
    //执行修改密码
    Route::post('/user/info/update','PasswordController@update');
    //用户评论
    Route::post('/user/comment','CommentController@comment');
    //我的评论
    Route::get('/user/comment/list','CommentController@list');
    //删除评论
    Route::get('/user/comment/delete','CommentController@delete');
    //现金劵
    Route::get('/user/xianjinjuan','XianjinjuanController@index');
    Route::get('/user/xianjinjuan/duihuan','XianjinjuanController@duihuan');

    //地址创建
    Route::get('/user/address','AddressController@add');
    //
    Route::get('/user/address/edit','AddressController@edit');
    // ajax获取地区信息
    Route::get('/user/address/get','AddressController@get');
    //
    Route::post('/user/address/insert','AddressController@insert');
    //我的课程
    Route::get('/user/class','ClassController@classed');
    // 地址修改
    Route::get('/user/address/insert','AddressController@update');
    // 地址删除
    Route::get('/user/address/del','AddressController@del');
    // 账户余额
    Route::get('/user/account_log','AccountLogController@index');
    // 积分
    Route::get('/user/jifen','JifenController@index');
    // 在线充值
    Route::get('/user/online_recharge','OnlineRechargeController@index');
    // 执行充值
    Route::post('/user/online_recharge','OnlineRechargeController@chongzhi');
    // 充值成功
    Route::get('/user/online_recharge/success','OnlineRechargeController@success');

});
});


// 后台权限控制
Route::group(['middleware'=>'login'],function(){
    // 后台首页
    Route::get('/admin','AdminController@index');
    // 导航管理(隐式控制器)
    Route::Controller('/admin/top','TopController');
    // 公告管理
    Route::Controller('/admin/article','ArticleController');
    // 用户管理
    Route::Controller('/admin/user','UserController');
    // 分类管理
    Route::Controller('/admin/cate','CateController');
    // 商品管理
    Route::Controller('/admin/goods','GoodsController');
    // 现金卡卷
    Route::Controller('/admin/kajuan','KajuanController');
    // 采集器
    Route::get('/ke.qq.com','KeController@index');
    Route::get('/ceshi','CeshiController@index');
    Route::get('/jimu','JimuController@index');
    //后台评价管理
    Route::get('/admin/comment/lists','CommentController@lists');
    //后台的删除评论
    Route::get('/admin/comment/deletes','CommentController@deletes');

    // 友情链接管理
    Route::Controller('/admin/links','LinksController');
    // 轮播管理
    Route::Controller('/admin/lunbo','LunboController');

    // 网站配置
    Route::Controller('/admin/config','ConfigController');

});
