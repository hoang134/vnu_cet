<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

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

Route::get('/', function () {
   return redirect()->route('cet.home');
});


Route::get('login','App\Http\Controllers\Home\LoginController@getLogin');
Route::post('login','App\Http\Controllers\Home\LoginController@login')->name('login');
Route::get('logout','App\Http\Controllers\Home\LoginController@logout')->name('logout');


//Xử lý đăng ký tài khoản
Route::get('register','App\Http\Controllers\Home\LoginController@register')->name('register');
Route::post('verify-register','App\Http\Controllers\Student\MailController@sendEmail')->name('register.verify');
Route::get('/verify','App\Http\Controllers\Student\MailController@verifyUser')->name('register.verify.user');

Route::get('/forgot-password','App\Http\Controllers\Home\LoginController@forgot_password')->name('forgotpassword');
Route::post('verify-forgot-password','App\Http\Controllers\Student\MailController@send_forgot_password')->name('send.forgotpassword');

//Thông tin về trung tâm
Route::get('cet-home','App\Http\Controllers\Home\CetInfomationController@cet_infomation_home')->name('cet.home');
Route::get('cet-infomation-cocau','App\Http\Controllers\Home\CetInfomationController@cet_infomation_cocau')->name('cet.cocau');
Route::get('cet-infomation-chucnang','App\Http\Controllers\Home\CetInfomationController@cet_infomation_chucnang')->name('cet.chucnang');

//Thông tin về các kỳ thi,sự kiện
Route::get('cet-notification-events','App\Http\Controllers\Home\CetNotificationController@cet_notification_events')->name('cet.notification.event');
Route::get('cet-notification-event-detail/su-kien-{id}','App\Http\Controllers\Home\CetNotificationController@cet_notification_event_detail')->name('cet.notification.event.detail');
Route::get('cet-notification-exams','App\Http\Controllers\Home\CetNotificationController@cet_notification_exams')->name('cet.notification.exam');
Route::get('cet-notification-exam-detail/ky-thi-{Makythi}','App\Http\Controllers\Home\CetNotificationController@cet_notification_exam_detail')->name('cet.notification.exam.detail');

//
Route::get('home','App\Http\Controllers\Home\HomeController@index')->name('home');
Route::get('home/question','App\Http\Controllers\Home\HomeController@question')->name('home.question');
Route::get('question-detail/{id}','App\Http\Controllers\Home\HomeController@question_detail')->name('question.detail');

Route::prefix('student')->middleware('CheckLogin')->group(function (){
    Route::post('question/create','App\Http\Controllers\Student\StudentController@createQuestion')->name('student.question.create');
    Route::get('my/question','App\Http\Controllers\Student\StudentController@myQuestion')->name('student.my.question');

    Route::get('service','App\Http\Controllers\Student\ServiceController@index')->name('student.service');
    Route::post('create/requite/service/{id}','App\Http\Controllers\Student\ServiceController@createRequiteService')->name('student.requite.service');

    Route::get('messengers','App\Http\Controllers\Student\MessengerController@messenger')->name('student.messengers');
    Route::post('messengers/reply','App\Http\Controllers\Student\MessengerController@reply')->name('student.messengers.reply');

    Route::get('xacnhandiemthi','App\Http\Controllers\Student\CetXacNhanDiemThiController@index')->name('xacnhandiemthi');
    Route::post('xacnhandiemthi/store','App\Http\Controllers\Student\CetXacNhanDiemThiController@store')->name('xacnhandiemthi.store');

    Route::get('change-user-infomation','App\Http\Controllers\Home\LoginController@change_user_infomation')->name('change.infomation');
    Route::post('save-change-password','App\Http\Controllers\Home\LoginController@save_change_password')->name('change.password');
    Route::post('save-change-user-infomation','App\Http\Controllers\Home\LoginController@save_change_user_infomation')->name('change.infomation.user');
});


Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->middleware('CheckLogin')->middleware('auth:admin')->group(function () {
    Route::prefix('question')->name('question.')->group(function () {
        Route::get('','QuestionController@index')->name('index');
        Route::get('data','QuestionController@getQuestions')->name('data');
        Route::post('reply/{id}','QuestionController@reply')->name('reply');
        Route::get('reply/{id}','QuestionController@getQuestionReply');
        Route::get('create','QuestionController@create')->name('create');
        Route::post('save','QuestionController@save')->name('save');
        Route::post('change/type/{id}','QuestionController@changeType')->name('change.type');
        Route::post('edit/{id}','QuestionController@edit')->name('edit');
        Route::post('delete','QuestionController@delete')->name('delete');
        Route::post('search','QuestionController@search')->name('search');
    });
    Route::prefix('messengers')->name('messengers.')->group(function () {
        Route::get('','MessengerController@index')->name('index');
        Route::get('/{tendangnhap}','MessengerController@detail')->name('detail');
        Route::post('reply/{tendangnhap}','MessengerController@reply')->name('reply');
    });
    Route::prefix('service')->name('service.')->group(function () {
        Route::get('','ServiceController@index')->name('index');
        Route::get('create','ServiceController@create')->name('create');
        Route::post('save','ServiceController@save')->name('save');
        Route::get('{id}/edit','ServiceController@edit')->name('edit');
        Route::put('{id}/update','ServiceController@update')->name('update');
        Route::get('list/register','ServiceController@lisRegister')->name('list.register');
        Route::get('handle/{id}','ServiceController@handle')->name('handle');
    });

    Route::get('xacnhandiemthi','CetXacNhanDiemThiController@index');
    Route::get('xacnhandiemthi/handle/{tendangnhap}','CetXacNhanDiemThiController@handle')->name('xacnhandiemthi.handle');

    Route::get('/edit-infomation','InfomationController@edit_infomation')->name('edit.infomation');
    Route::get('/edit-infomation-cocau','InfomationController@edit_infomation_cocau')->name('edit.infomation.cocau');
    Route::get('/edit-infomation-chucnang','InfomationController@edit_infomation_chucnang')->name('edit.infomation.chucnang');
    Route::get('/edit-infomation-logo','InfomationController@edit_infomation_logo')->name('edit.logo');
    Route::post('/save-infomation','InfomationController@save_infomation')->name('save.infomation');
    Route::post('/save-logo','InfomationController@save_logo')->name('save.logo');

    Route::get('/add-notification','NotificationController@add_event')->name('add.notification');
    Route::post('/save-notification','NotificationController@save_event')->name('save.notification');
    Route::get('/all-notification','NotificationController@index')->name('all.notification');
    Route::get('/delete-notification/{id}','NotificationController@delete_event')->name('delete.notification');
    Route::get('/edit-notification/{id}','NotificationController@edit_event')->name('edit.notification');
    Route::post('/save-edit-notification','NotificationController@save_edit_event')->name('save.edit.notification');

});
Route::get('clear-cache-all', function() {
    Artisan::call('cache:clear');

    dd("Cache Clear All");
});
