<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ArticleController;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\StateController;
use \App\Http\Controllers\Admin\CityController;
use \App\Http\Controllers\Admin\CenterController;
use \App\Http\Controllers\Admin\WorktimeController;
use \App\Http\Controllers\Admin\OptionController;
use \App\Http\Controllers\Admin\GalleryController;
use \App\Http\Controllers\Admin\CommentController;
use \App\Http\Controllers\Admin\ProductController;
use \App\Http\Controllers\Admin\ChairController;
use \App\Http\Controllers\Admin\ChairReserveController;
use \App\Http\Controllers\Admin\ReserveController;
use \App\Http\Controllers\Admin\ProductReserveController;
use \App\Http\Controllers\Admin\TrashCategoryController;
use \App\Http\Controllers\Admin\TrashCenterController;
use \App\Http\Controllers\Admin\TrashChairController;
use \App\Http\Controllers\Admin\TrashOptionController;
use \App\Http\Controllers\Admin\TrashProductController;
use \App\Http\Controllers\Admin\BlockUserController;
use \App\Http\Controllers\Admin\TicketController;
use \App\Http\Controllers\Admin\QuestionController;
use \App\Http\Controllers\Admin\AnswerController;
use \App\Http\Controllers\Admin\CloseTicketController;
use \App\Http\Controllers\Admin\ContactUsController;
use \App\Http\Controllers\Admin\SuccessPaymentController;
use \App\Http\Controllers\Admin\DiscountController;
use \App\Http\Controllers\Admin\PermissionController;
use \App\Http\Controllers\Admin\RoleController;
use \App\Http\Controllers\Admin\RoleUserController;
use \App\Http\Controllers\Admin\CacheController;
use \App\Http\Controllers\Admin\WishListController;


Route::get('dashboard',[DashboardController::class , 'index'])->name('dashboard-one');
Route::post('/panel/CK' , [DashboardController::class , 'Upload_CLEDITOR_image']);

Route::resource('categories', CategoryController::class)->only(['index' , 'create' , 'store' ,'edit' , 'update']);
Route::resource('articles' , ArticleController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('users' , UserController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('settings' , SettingController::class)->only(['index' , 'create' , 'edit']);
Route::resource('states' , StateController::class)->only(['index' , 'create' , 'edit']);
Route::resource('cities' , CityController::class)->only(['index' , 'create' , 'edit']);
Route::resource('centers' , CenterController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('work-times' , WorktimeController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('options' , OptionController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('galleries' , GalleryController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('comments' , CommentController::class)->only(['index' , 'edit' , 'NotApproved']);
Route::resource('products' , ProductController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('chairs' , ChairController::class)->only(['index' , 'create' , 'edit']);
Route::resource('tickets' , TicketController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('questions' , QuestionController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('answers' , AnswerController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('discounts' , DiscountController::class)->only(['index' , 'create' , 'edit']);
Route::resource('permissions' , PermissionController::class)->only(['index' , 'create' , 'edit']);
Route::resource('roles' , RoleController::class)->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource('wish-lists' , WishListController::class)->only(['index' , 'create' , 'edit']);
Route::resource('success_payments' , "\App\Http\Controllers\Admin\SuccessPaymentController" , ['parameters' => ['success_payments' => 'payment' ]])->only(['index']);
Route::resource('failed_payments' , "\App\Http\Controllers\Admin\FailedPaymentController" , ['parameters' => ['failed_payments' => 'payment' ]])->only(['index']);
Route::resource("reserves", "\App\Http\Controllers\Admin\ReserveController" , ['parameters' => ['reserves' => 'reserve' ]])->only(['index' , 'create' , 'store' , 'edit' , 'update']);
Route::resource("contact_us", "\App\Http\Controllers\Admin\ContactUsController" , ['parameters' => ['contact_us' => 'contactUs' ]])->only(['index' , 'create' , 'store' , 'edit' , 'update']);

// Relations
Route::resource('chair_reserves' , ChairReserveController::class)->only(['index']);
Route::resource("option_reserve", "\App\Http\Controllers\Admin\OptionReserveController" , ['parameters' => ['option_reserve' => 'optionReserve' ]])->only(['index' , 'create' , 'edit']);
Route::resource("product_reserves", "\App\Http\Controllers\Admin\ProductReserveController" , ['parameters' => ['product_reserves' => 'productReserve' ]])->only(['index' , 'create' , 'edit']);
Route::resource('roles_users' ,"\App\Http\Controllers\Admin\RoleUserController" , ['parameters' => ['roles_users' => 'user']])->only(['index' , 'create' , 'store' , 'edit' , 'update']);

// Trashes and Blocks and Closed
Route::resource('trash_categories' , TrashCategoryController::class)->only(['index']);
Route::resource('trash_centers' , TrashCenterController::class)->only(['index']);
Route::resource('trash_chairs' , TrashChairController::class)->only(['index']);
Route::resource('trash_options' , TrashOptionController::class)->only(['index']);
Route::resource('trash_products' , TrashProductController::class)->only(['index']);
Route::resource('block_users' , BlockUserController::class)->only(['index']);
Route::resource('close_tickets' , CloseTicketController::class)->only(['index']);
Route::get('NotApproved_comments' , [CommentController::class , "NotApproved"])->name('NotApprovedComments');
Route::get('caches' , [CacheController::class , 'delete'])->name('caches.delete');
Route::get('failed_reserves' , [ReserveController::class , 'failed_reserves'])->name('reserves.failed');
