<?php
//app/Http/Controllers
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
  //Phương thức thêm mới danh mục trong CRUD
  // Route đang là: /category/create
  public function create()
  {
    // Gọi 1 view để hiển thị form thêm mới danh mục
//    return view()
    // Tạo 2 thư mục sau:
    // - resources/views/
    //                  /categories/
    //                             /index.blade.php
    //                             /create.blade.php
    //                             /edit.blade.php
    //                  /products/
    //                           /index.blade.php
    //                           /create.blade.php
    //                           /edit.blade.php
    //                  /layouts /main.blade.php: file layout


    //template engine Blade, .blade.php
    // Gọi view tương ứng
    return view('categories/create', []);

  }

  public function store(Request $request)
  {
// + Với Laravel, quên các biến $_GET, $_POST,
// dùng 1 đối tượng duy nhất của class Request mà Laravel
// cung cấp sẵn
//// + Đối tượng này mặc định bất cứ 1 phương thức nào đều có
///  sẵn, đối tượng này là của class Request
/// // dump + die
    // + Lấy các thông tin từ form
    $name = $request->get('name');
    $description = $request->get('description');
    // + Validate form
    $rules = [
      'name' => ['required', 'min:3'],
      'description' => ['required']
    ];
    $messages = [
      'name.required' => 'Name ko đc để trống',
      'name.min' => 'Name phải có ít nhất 3 ký tự',
      'description.required' => 'Description ko đc để trống'
    ];
    // Gọi hàm valiate
    $this->validate($request, $rules, $messages);
//    dd($request);
  }
}
