<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//登录页面
Route::get('/', 'LoginController@index1');
Route::resource('login', 'LoginController');
Route::get('/logout',['as'=>"logout",'uses'=>"LoginController@logout"]);//登出
//登录验证中间件组
Route::middleware(['web','CheckLogin'])->group(function (){

    //后台页面
    Route::resource('adminindex', 'AdminManagerController');//综合评价
    Route::get('/pjall/',['as'=>"pjall",'uses'=>"AdminManagerController@pjall"]);//汇总评价
    Route::post('/xxpj',['as'=>"xxpj",'uses'=>"AdminManagerController@pjallpost"]);//汇总评价
    Route::get('/stucom/',['as'=>"stucom",'uses'=>"AdminManagerController@stucom"]);//学生代表统计
    Route::post('/stucompost/',['as'=>"stucompost",'uses'=>"AdminManagerController@stucompost"]);//学生代表统计
    Route::get('/member/',['as'=>"member",'uses'=>"AdminManagerController@member"]);//详细评价
    Route::post('/member',['as'=>"member",'uses'=>"AdminManagerController@memberstore"]);//详细评价


    Route::middleware(['web','AdminLogin'])->group(function (){
        //账户管理
        Route::resource('adminmanager', 'AdminController');
        Route::get('/setadmin/{id}',['as'=>"setadmin",'uses'=>"AdminController@setadmin"]);//管理员权限转换
        Route::get('/setlogin/{id}',['as'=>"setlogin",'uses'=>"AdminController@setlogin"]);//登录权限转换
        Route::get('/deleteadmin/{id}',['as'=>"delete",'uses'=>"AdminController@delete"]);//delete

        //学期管理
        Route::resource('termmanager', 'TermController');
        Route::get('/deleteterm/{id}',['as'=>"deleteterm",'uses'=>"TermController@delete"]);//delete

        //学院管理
        Route::resource('schoolmanager', 'SchoolController');
        Route::get('/deleteschool/{id}',['as'=>"deleteschool",'uses'=>"SchoolController@delete"]);//delete

        //学校职能部门管理
        Route::resource('bumenmanager', 'BumenController');
        Route::get('/deletebumen/{id}',['as'=>"deletebumen",'uses'=>"BumenController@delete"]);//delete

        //学生代表管理
        Route::resource('membermanager', 'MemberController');
        Route::get('/download',['as'=>"download",'uses'=>"MemberController@download"]);//学生模板下载
        Route::post('/delmany',['as'=>"delmany",'uses'=>"MemberController@delmany"]);//学生批量删除
        Route::post('/sendmsg',['as'=>"sendmsg",'uses'=>"MemberController@sendmsg"]);//学生发送短信

        //文件导入导出
        Route::get('excel/export','ExcelCOntroller@export');
        Route::post('excel/import','ExcelCOntroller@import'); //学生批量导入
    });

});


//前端评价页面
Route::get('/start',['as'=>"start",'uses'=>"FrontController@start"]);

//验证登陆
Route::post('dati', 'FrontController@dati');
//前端评价内容页面
Route::post('content/{id}', 'FrontController@index');
//评价选项保存路由
Route::post('store', 'FrontController@store');
//评价完成
Route::get('finish', 'FrontController@finish');
