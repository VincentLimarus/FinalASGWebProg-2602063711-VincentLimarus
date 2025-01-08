<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\TopUpCoinsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('payment-form', [UserController::class, 'showPaymentForm'])->name('payment.form')->middleware('auth');
Route::post('payment-form', [UserController::class, 'processPayment'])->name('payment.submit')->middleware('auth');

Route::get("topup-coins", [TopUpCoinsController::class, 'showTopUpPages'])->name('topup-coins')->middleware('auth');
Route::post("topup-coins", [TopUpCoinsController::class, 'topUpCoins'])->name('topup-coins.submit')->middleware('auth');

Route::get("visible-setting", [UserController::class, 'viewChangeVisible'])->name('visible-setting')->middleware('auth');
Route::post("visible-setting", [UserController::class, 'purchaseVisibility'])->name('change-visibility.submit')->middleware('auth');
Route::post('deactivate-visible', [UserController::class, 'deactivateVisiblity'])->name('change-visibility2.submit')->middleware('auth');

Route::get('shop-avatar', [UserController::class, 'viewShop'])->name('view-shop')->middleware('auth');
Route::post('shop-avatar/buy/{id}', [AvatarController::class, 'buyAvatar'])->name('buy-avatar.submit')->middleware('auth');
Route::post('shop-avatar/equip/{id}', [AvatarController::class, 'equipAvatar'])->name('equip-avatar.submit')->middleware('auth');

Route::get('search-users', [UserController::class, 'searchUsers'])->name('search-users')->middleware('auth');
Route::get('friends', [UserController::class, 'viewFriends'])->name('user.friends')->middleware('auth');

Route::post('send-friend-request/{id}', [UserController::class, 'requestAddFriend'])->name('send-friend-request.submit')->middleware('auth');

Route::post('delete-friend/{id}', [UserController::class, 'deleteFriend'])->name('delete-friend.submit')->middleware('auth');
Route::post('delete-request/{id}', [UserController::class, 'deleteRequest'])->name('delete-request.submit')->middleware('auth');

Route::post('delete-friend-request/{id}', [UserController::class, 'deleteRequestFromUser'])->name('delete-friend-request.submit')->middleware('auth');
Route::post('accept-friend-request/{id}', [UserController::class, 'acceptRequest'])->name('accept-friend-request.submit')->middleware('auth');



