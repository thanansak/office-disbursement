<?php

use Illuminate\Support\Facades\Route;

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

Route::get('storage_link', function () {
    Artisan::call('storage:link');
});

Route::get('config_clear', function () {
    Artisan::call('config:clear');
});


Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginform']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Auth::routes();


        Route::group(['middleware' => ['is_active']], function () {
            Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

            // Route::prefix('admin')->group(function () {
                Route::group(['middleware' => ['permission:*|dashboard']], function () {
                    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');
                    Route::resource('/dashboard', \App\Http\Controllers\Admin\DashboardController::class);
                });
                //Main Menu

                Route::group(['middleware' => ['permission:*|all member|view member']], function () {
                    Route::resource('/member', App\Http\Controllers\Admin\MemberController::class);
                    Route::get('/member/publish/{id}', [\App\Http\Controllers\Admin\MemberController::class, 'publish'])->name('member.publish');
                    Route::get('/member/softdel/{id}', [\App\Http\Controllers\Admin\MemberController::class, 'softDel'])->name('member.softDel');
                    Route::get('/member/sort/{id}', [App\Http\Controllers\Admin\MemberController::class, 'sort'])->name('member.sort');
                });

                //Prefix
                Route::group(['middleware' => ['permission:*|all prefix|view prefix']], function(){
                    Route::get('/prefix', [\App\Http\Controllers\Admin\UserPrefixController::class,'index'])->name('prefix.index');
                    Route::post('/prefix/store', [\App\Http\Controllers\Admin\UserPrefixController::class,'store'])->name('prefix.store');
                    Route::get('/prefix/edit/{id}', [\App\Http\Controllers\Admin\UserPrefixController::class,'edit'])->name('prefix.edit');
                    Route::post('/prefix/update', [\App\Http\Controllers\Admin\UserPrefixController::class,'update'])->name('prefix.update');
                    Route::delete('/prefix/destroy/{id}', [\App\Http\Controllers\Admin\UserPrefixController::class,'destroy'])->name('prefix.destroy');
                    Route::get('/prefix/publish/{id}', [\App\Http\Controllers\Admin\UserPrefixController::class, 'publish'])->name('prefix.publish');
                    Route::get('/prefix/sort/{id}', [\App\Http\Controllers\Admin\UserPrefixController::class, 'sort'])->name('prefix.sort');
                });

                //User
                Route::group(['middleware' => ['permission:*|all user|view user']], function(){
                    Route::get('/user', [\App\Http\Controllers\Admin\UserController::class,'index'])->name('user.index');
                    Route::post('/user/store', [\App\Http\Controllers\Admin\UserController::class,'store'])->name('user.store');
                    Route::get('/user/edit/{id}', [\App\Http\Controllers\Admin\UserController::class,'edit'])->name('user.edit');
                    Route::post('/user/update', [\App\Http\Controllers\Admin\UserController::class,'update'])->name('user.update');
                    Route::delete('/user/destroy/{id}', [\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('user.destroy');

                    Route::get('/user/publish/{id}', [\App\Http\Controllers\Admin\UserController::class, 'publish'])->name('user.publish');
                });

                //User History
                Route::group(['middleware' => ['permission:*|all user_history|view user_history']], function(){
                    Route::get('/user_history', [\App\Http\Controllers\Admin\UserHistoryController::class,'index'])->name('user_history.index');
                    Route::get('/user_history/recovery/{id}', [\App\Http\Controllers\Admin\UserHistoryController::class,'recovery'])->name('user.recovery');
                    Route::delete('/user_history/destroy/{id}', [\App\Http\Controllers\Admin\UserHistoryController::class,'destroy'])->name('user.destroy');
                });

                //Role
                Route::group(['middleware' => ['permission:*|all role|view role']], function(){
                    Route::get('/role', [\App\Http\Controllers\Admin\RoleController::class,'index'])->name('role.index');
                    Route::post('/role/store', [\App\Http\Controllers\Admin\RoleController::class,'store'])->name('role.store');
                    Route::get('/role/edit/{id}', [\App\Http\Controllers\Admin\RoleController::class,'edit'])->name('role.edit');
                    Route::post('/role/update', [\App\Http\Controllers\Admin\RoleController::class,'update'])->name('role.update');
                    Route::delete('/role/destroy/{id}', [\App\Http\Controllers\Admin\RoleController::class,'destroy'])->name('role.destroy');
                });

                //Permission
                Route::group(['middleware' => ['permission:*|all permission|view permission']], function(){
                    Route::get('/permission', [\App\Http\Controllers\Admin\PermissionController::class,'index'])->name('permission.index');
                    Route::post('/permission/store', [\App\Http\Controllers\Admin\PermissionController::class,'store'])->name('permission.store');
                    Route::get('/permission/edit/{id}', [\App\Http\Controllers\Admin\PermissionController::class,'edit'])->name('permission.edit');
                    Route::post('/permission/update', [\App\Http\Controllers\Admin\PermissionController::class,'update'])->name('permission.update');
                    Route::delete('/permission/destroy/{id}', [\App\Http\Controllers\Admin\PermissionController::class,'destroy'])->name('permission.destroy');
                });

                // ProductType
                Route::group(['middleware' => ['permission:*|all product_type|view product_type']], function(){
                    Route::get('/product_type', [\App\Http\Controllers\Admin\ProductTypeController::class,'index'])->name('product_type.index');
                    Route::post('/product_type/store', [\App\Http\Controllers\Admin\ProductTypeController::class,'store'])->name('product_type.store');
                    Route::get('/product_type/edit/{id}', [\App\Http\Controllers\Admin\ProductTypeController::class,'edit'])->name('product_type.edit');
                    Route::post('/product_type/update', [\App\Http\Controllers\Admin\ProductTypeController::class,'update'])->name('product_type.update');
                    Route::delete('/product_type/destroy/{id}', [\App\Http\Controllers\Admin\ProductTypeController::class,'destroy'])->name('product_type.destroy');
                    Route::get('/product_type/publish/{id}', [\App\Http\Controllers\Admin\ProductTypeController::class, 'publish'])->name('product_type.publish');

                });

                // Product
                Route::group(['middleware' => ['permission:*|all product|view product']], function(){
                    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class,'index'])->name('product.index');
                    Route::post('/product/store', [\App\Http\Controllers\Admin\ProductController::class,'store'])->name('product.store');
                    Route::get('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('product.edit');
                    Route::post('/product/update', [\App\Http\Controllers\Admin\ProductController::class,'update'])->name('product.update');
                    Route::delete('/product/destroy/{id}', [\App\Http\Controllers\Admin\ProductController::class,'destroy'])->name('product.destroy');

                });

                // Disbursement
                Route::group(['middleware' => ['permission:*|all disbursement|view disbursement']], function(){
                    Route::get('/disbursement', [\App\Http\Controllers\Admin\DisbursementController::class,'index'])->name('disbursement.index');
                    Route::post('/disbursement/store', [\App\Http\Controllers\Admin\DisbursementController::class,'store'])->name('disbursement.store');
                    Route::get('/disbursement/edit/{id}', [\App\Http\Controllers\Admin\DisbursementController::class,'edit'])->name('disbursement.edit');
                    Route::post('/disbursement/update', [\App\Http\Controllers\Admin\DisbursementController::class,'update'])->name('disbursement.update');
                    Route::delete('/disbursement/destroy/{id}', [\App\Http\Controllers\Admin\DisbursementController::class,'destroy'])->name('disbursement.destroy');
                    Route::get('/disbursement/show/{id}', [\App\Http\Controllers\Admin\DisbursementController::class,'show'])->name('disbursement.show');
                    Route::get('/disbursement/getdata-product/{id}', [\App\Http\Controllers\Admin\DisbursementController::class,'getDataProductByid'])->name('disbursement.get.data.product');
                });

                // Disbursement admin
                Route::group(['middleware' => ['permission:*|disbursement_detail|disbursement_approve']], function(){
                    Route::get('/disbursement_admin', [\App\Http\Controllers\Admin\DisbursementAdminController::class,'index'])->name('disbursement_admin.index');
                    Route::get('/disbursement_admin/approve/{id}', [\App\Http\Controllers\Admin\DisbursementAdminController::class,'DisbursementApproval'])->name('disbursement_admin.approve');
                    Route::get('/disbursement_admin/reject/{id}', [\App\Http\Controllers\Admin\DisbursementAdminController::class,'DisbursementRejection'])->name('disbursement_admin.reject');
                    Route::get('/disbursement_admin/show/{id}', [\App\Http\Controllers\Admin\DisbursementAdminController::class,'show'])->name('disbursement_admin.show');

                });

                // Disbursement history
                Route::group(['middleware' => ['permission:*|all disbursement_history|view disbursement_history']], function(){
                    Route::get('/disbursement_history', [\App\Http\Controllers\Admin\DisbursementHistoryController::class,'index'])->name('disbursement_history.index');
                    Route::post('/disbursement_history/store', [\App\Http\Controllers\Admin\DisbursementHistoryController::class,'store'])->name('disbursement_history.store');
                    Route::get('/disbursement_history/edit/{id}', [\App\Http\Controllers\Admin\DisbursementHistoryController::class,'edit'])->name('disbursement_history.edit');
                    Route::post('/disbursement_history/update', [\App\Http\Controllers\Admin\DisbursementHistoryController::class,'update'])->name('disbursement_history.update');
                    Route::delete('/disbursement_history/destroy/{id}', [\App\Http\Controllers\Admin\DisbursementHistoryController::class,'destroy'])->name('disbursement_history.destroy');
                });

                //Website Setting
                Route::group(['middleware' => ['permission:*|website_setting']], function () {
                    Route::resource('/setting', App\Http\Controllers\Admin\SettingController::class);
                });

               //User Profile
               Route::get('/user/profile/{user}', [\App\Http\Controllers\Admin\UserController::class, 'profile'])->name('user.profile');
               Route::put('/user/profile/update/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update_profile'])->name('user.profile.update');
            // });

            //Dropzone
            Route::post('/dropzone/upload', [App\Http\Controllers\Admin\DropzoneController::class, 'uploadimage'])->name('dropzone.upload');
            Route::post('/dropzone/delete', [App\Http\Controllers\Admin\DropzoneController::class, 'deleteupload'])->name('dropzone.delete');

            //Summernote
            Route::post('/summernote/upload', [App\Http\Controllers\Admin\SummernoteController::class, 'uploadimage'])->name('summernote.upload');
            Route::post('/summernote/delete', [App\Http\Controllers\Admin\SummernoteController::class, 'deleteupload'])->name('summernote.delete');

            //CKEditor
            Route::post('/ckeditor/upload', [App\Http\Controllers\Admin\CKEditorController::class, 'uploadImage'])->name('ckeditor.upload');
            Route::post('/ckeditor/delete', [App\Http\Controllers\Admin\CKEditorController::class, 'deleteImage'])->name('ckeditor.delete');
        });