<?php
//create_table_categories
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Các framework đều thêm tên class phía trước khi truyền
      //tham số để sử dụng chức năng suggestion khi gõ code
        Schema::create('categories', function (Blueprint $table) {
          // Dùng $table để tạo các trường cho bảng categories
          // id, name, description, created_at, updated_at
          $table->increments('id');
          $table->string('name', 100);
          $table->text('description');
          //Tự sinh luôn 2 trường created_at và updated_at bằng
          //phương thức sau
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //PHương thức down ngược lại với up
      //vd: nếu up là tạo bảng -> down sẽ xóa bảng ...
        Schema::dropIfExists('categories');
    }
}
