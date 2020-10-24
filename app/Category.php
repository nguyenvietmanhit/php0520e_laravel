<?php
//
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//  public $table = 'categories';
// + Model trong Laravel có cơ chế tự động liên kết ddc với
//bảng tương ứng dựa theo tên
////vd: Category -> categories
/// Product -> products
// + Nếu tên bảng ko ở dạng số nhiều thì model cần khai báo
//tường mình tên bảng thông qua thuộc tính $table
// + Sau khi mapping đc model với bảng, thì model mặc định sẽ
//có các thuộc tính chính là các tên trường trong bảng

  public function insert($params) {
//    dd($this);
    $this->name = $params['name'];
    $this->description = $params['description'];
    $is_insert = $this->save();
    return $is_insert;
  }

  public function getAllPagination() {
    // Lấy tất cả bản ghi
//    $categories = Category::all();
//    dd($categories);
    // Sử dụng cơ chế phân trang, với 2 bản ghi trên 1 trang
    $categories = Category::paginate(2);
    return $categories;
  }

  public function getOne($id) {
    // Lấy đối tượng theo id
//    $category = Category::where('status', 1)->find($id);
    $category = Category::find($id);
//    dd($category);
    return $category;
  }

  public function updateCategory($id, $param) {
    // Lấy ra category muốn update theo id
    $category = Category::find($id);
    // Để phpstorm gợi ý đc phương thức, có thể dùng cách
    //sau
    if ($category instanceof Category);
    $category->name = $param['name'];
    $category->description = $param['description'];
    $is_update = $category->save();
    return $is_update;
  }

  public function deleteCategory($id) {
    // Lấy đối tượng muốn xóa theo id
    $category = Category::find($id);
    if ($category instanceof Category);
    $is_delete = $category->delete();
    return $is_delete;
  }
}
