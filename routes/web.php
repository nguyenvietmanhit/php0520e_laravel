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

//routes/web.php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
  echo "Nội dung test";
});

//any chạy đc trong mọi trường hợp
Route::any('/demo', function() {
  echo 'Demo';
});

//Báo lỗi do route post chỉ dùng khi có thay đổi CSDL
Route::post('/demo-post', function() {
  echo 'Demo';
});

// Route có 1 tham số
Route::get('/san-pham/{product_id}', function($product_id) {
  echo "Sản phẩm đang có id là $product_id";
});
// Route có nhiều tham số
Route::get('/test/{param1}/{param2}', function ($param1, $param2) {
  echo "Param 1: $param1, Param 2: $param2";
});

// Route quy định controller và action nào xử lý
Route::get('/demo-2', 'DemoController@demo');

// Route có tham số với trường hợp trên
Route::get('/update-demo/{id}', 'DemoController@update');

Route::get('/test-route', [TestController::class, 'test']);

Route::get('/test/{id}', [TestController::class, 'testId']);

// Khai báo các route cho ứng dụng CRUD
// Category
// + Liệt kê danh mục
Route::get('/list/category',
    [CategoryController::class, 'index']);
// + Thêm mới danh mục, cần 2 route để xử lý, 1 route GET để
// hiển thị ra form thêm mới, 1 route POST để thêm mới vào
// CSDL
// Route hiển thị form thêm mới
Route::get('/category/create',
    [CategoryController::class, 'create']);
// Route thêm dữ liệu vào CSDL
Route::post('/category/store',
    [CategoryController::class, 'store']);
// + Update danh mục, cần 2 route tương tự như Thêm mới
// Route hiển thị form update
Route::get('/category/{id}/edit',
    [CategoryController::class, 'edit']);
// Route update dữ liệu, với update sử dụng route put/patch
Route::put('/category/{id}/update',
    [CategoryController::class, 'update']);
// + Xóa danh mục, sử dụng route Delete theo chuẩn RESTFUL
//của Laravel
Route::delete('/category/destroy/{id}',
    [CategoryController::class, 'destroy']);

// Khai báo các route CRUD cho sản phẩm
// + Liệt kê sản phẩm
Route::get('/list/product',
    [ProductController::class, 'index']);
// + Thêm mới sản phẩm: cần 2 route
// Route hiển thị form thêm mới
Route::get('/product/create',
    [ProductController::class, 'create']);
// Route lưu thông tin vào CSDL
Route::post('/product/store',
    [ProductController::class, 'store']);
// + Update sản phẩm: cần 2 route
// Route hiển thị form update
Route::get('/product/{id}/edit',
    [ProductController::class, 'edit']);
// Route xử lý update vào CSDL, sử dụng route PUT theo RESTFUL
Route::put('/product/{id}/update',
    [ProductController::class, 'update']);
// + Xóa sản phẩm, route DELETE
Route::delete('/product/destroy/{id}',
    [ProductController::class, 'destroy']);
