<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('login');

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('index', 'PageController@index')->name('index');

Route::get('user-validation','PageController@showUserValidate')->name('validation');
Route::post('user-validation','PageController@userValidate')->name('validation');

Route::get('user-reject','PageController@showUserReject')->name('reject');

Route::get('upload-draft','PageController@showUploadDraft')->name('upload-draft');
Route::post('upload-draft','PageController@uploadDraft')->name('upload-draft');

Route::get('meet','PageController@showMeetForm')->name('meet');
Route::post('meet','PageController@meetForm')->name('meet');
Route::get('meet-calendar','PageController@showCalendar')->name('calendar');

Route::get('drafts-list-student','PageController@draftsListStudent')->name('drafts-list-student');
Route::post('drafts-list-student','PageController@editDraftStudent')->name('drafts-list-student');
Route::post('drafts-list-student','PageController@uploadDocuments')->name('uploading-documents');

Route::get('drafts-list-teacher', 'PageController@draftsListTeacher')->name('drafts-list-teacher');
Route::get('approve-draft','PageController@approveDraft')->name('approve-draft');

Route::get('assign-evaluators','PageController@showAssignEvaluators')->name('assign-evaluators');
Route::post('assign-evaluators','PageController@assignEvaluators')->name('assign-evaluators');

Route::get('evaluate-draft','PageController@showEvaluateDraft')->name('evaluate-draft');
Route::post('evaluate-draft','PageController@evaluateDraft')->name('evaluate-draft');


Route::get('draft-meetings','PageController@showDraftMeetings')->name('draft-meetings');
Route::post('draft-meetings','PageController@draftMeetings')->name('draft-meetings');
Route::post('approve-meetings','PageController@approveMeetings')->name('approve-meetings');
Route::get('approve-meetings','PageController@showApproveMeetings')->name('approve-meetings');

Route::get('finish-project','PageController@finishProject')->name('finish-project');
Route::get('project-objectives','PageController@projectObjectives')->name('project-objectives');
Route::get('accept-goals','PageController@acceptGoals')->name('accept-goals');
Route::get('drafts-trial','PageController@draftsTrial')->name('drafts-trial');
Route::get('assign-evaluators-project','PageController@assignEvaluatorsproject')->name('assign-evaluators-project');
Route::get('project-status','PageController@projectstatus')->name('project-status');

Route::get('drafts-record','PageController@draftsRecord')->name('drafts-record');
Route::get('drafts-list-admin','PageController@draftsListAdmin')->name('drafts-list-admin');

Route::get('director-approve','PageController@showDirectorApprove')->name('director-approve');
Route::post('director-approve','PageController@directorApprove')->name('director-approve');

/*

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
*/
