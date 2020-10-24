<?php
//app/Http/Controllers
namespace App\Http\Controllers;

//use App\Category;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // Lưu dữ liệu vào bảng categories, làm quen với 2 cách thức
    // tương tác với CSDL trong Laravel: QueryBuilder, Eloquent
    // + Lưu thông tin vào CSDL sử dụng QueryBuilder, tương
    //tác ko thông qua Model
//    $is_insert = DB::table('categories')->insert([
//        'name' => $name,
//        'description' => $description,
//    ]);
    // + Sử dụng cơ chế Eloquent để tương tác với CSDL, sử dụng
    //model
    // Cần tạo các model tương ứng, tạo bằng artisan
    // php artisan make:model Category
//    var_dump($is_insert);
//    spl_autoload_register - cơ chế autoload, tự động nhúng
    //các file tương ứng khi gọi 1 class bất kỳ
    $category_model = new Category();
    $params = [
        'name' => $name,
        'description' => $description
    ];
    $is_insert = $category_model->insert($params);

    // Tạo session và chuyển hướng về trang danh sách
    if ($is_insert) {
      // Ko nên sử dụng mảng $_SESSION, mà sử dụng cơ chế tạo
      //session của Laravel
      session()->flash('success', 'Thêm mới thành công');
    } else {
      session()->flash('error', 'Thêm mới thất bại');
    }
    //Chuyển hướng dựa vào route đã khai báo trong web.php
    return redirect('/list/category');
  }

  //Trang danh sách danh mục
  public function index()
  {
    $category_model = new Category();
    $categories = $category_model->getAllPagination();
    return view('categories/index', [
        'categories' => $categories
    ]);
  }

  // do route edit có 1 tham số động là id, nên có thể truyền
  //vào làm tham số cho phương thức
  public function edit($id)
  {
//    echo $id;
    //Lấy ra category theo id
    $category_model = new Category();
    $category = $category_model->getOne($id);

    return view('categories/edit', [
        'category' => $category
    ]);
  }

  public function update(Request $request, $id)
  {
    // Xử lý validate cho update
    $rules = [
        'name' => ['required', 'min:3'],
        'description' => ['required']
    ];
    $messages = [
        'name.required' => 'Name ko đc để trống',
        'name.min' => 'Name phải có ít nhất 3 ký tự',
        'description.required' => 'Description ko đc để trống'
    ];
    $this->validate($request, $rules, $messages);
    // Lấy ra các giá trị của form dựa vào $request
    $name = $request->get('name');
    $description = $request->get('description');
    $params = [
        'name' => $name,
        'description' => $description
    ];
    $category_model = new Category();
    $is_update = $category_model->updateCategory($id, $params);
    if ($is_update) {
      session()->flash('success', "update bản ghi $id thành công");
    } else {
      session()->flash('error', 'Update thất bại');
    }
    return redirect('/list/category');
  }

  public function destroy($id) {
    $category_model = new Category();
    $is_delete = $category_model->deleteCategory($id);
    if ($is_delete) {
      session()->flash('success', "Xóa bản ghi $id thành công");
    } else {
      session()->flash('error', "Xóa thất bại");
    }
    return redirect('/list/category');
  }
}
