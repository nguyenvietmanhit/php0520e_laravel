<?php
/**
 * laravel_co_ban.php
 * DEMO ứng dụng CRUD cơ bản sử dụng framework Laravel của PHP
 * - File .gitignore: GIT bỏ qua các đường dẫn đc
 *khai báo trong file này, Laravel đã quy định các
 *đường dẫn trong file này sẽ khác nhau với từng
 *local
 * - Khi lấy 1 source Laravel từ GIT về, cần chạy
 * lệnh sau để cài đặt Laravel:
 * composer install
 * - Học Laravel mà ko biết các lệnh artisan
 * thì ko nên học Laravel
 * - Laravel sử dụng composer để quản lý các thư viện
 * từ bên thứ 3 thông qua 2 lệnh:
 * + composer install: dùng khi lấy  source code mới từ GIt về,
 * cài đặt các thư viện cho Laravel
 * + composer update: dùng để update các thư viện lên phiên
 * bản mới nhất, chỉ chạy sau khi đã chạy composer install
 * Chú ý: thực tế trên các server thật cần cẩn thận khi muốn
 * update các thư viện bằng lệnh này
 *
 * TẠO ỨNG DỤNG CRUD PRODUCT BẰNG LARAVEL
 * - Tạo CSDL bằng tay CSDL tên = php0520e_laravel
 * CREATE DATABASE IF NOT EXISTS php0520e_laravel
CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo các bảng sử dụng cơ chế migrate của Laravel thông qua
 * lệnh: php artisan
 * + Tạo 2 bảng sau:
 * categories: id, name, description, created_at, updated_at
 * products: id, category_id, name, price, description, status
 * created_at, updated_at
 * + Sử dụng command line như cmder, cd vào thư mục gốc của
 * Laravel, thử chạy lệnh sau: php artisan
 * + Tạo ra các file migrate database (migrate có thể hiểu
 * đơn giản là CRUD bảng/trường bằng code PHP)
 * File sau khi tạo đc lưu tại database/migrations
 * + Viết lệnh sau để tạo file migrate dùng tạo bảng categories:
 * (các bảng trong Laravel đặt ở dạng số nhiều)
 * php artisan make:migration create_table_categories --create=categories
 * + Lệnh tạo bảng products
 * php artisan make:migration create_table_products --create=products
 * + Sau khi tạo 2 file xong, cần cấu hình kết nối CSDL để có
 * thể chạy migrate -> sinh ra bảng
 * Cấu hình tại file .env
 * + Chạy lệnh sau để chính thức tạo bảng trong MySQL,
 * php artisan migrate
 */