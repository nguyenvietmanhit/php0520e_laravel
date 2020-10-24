{{--resources/views/categories/create.blade.php--}}
{{--Để nhúng layout vào, dùng cú pháp sau:--}}
@extends('layouts.main')

{{--Truyền giá trị thật cho tham số động trong layout:--}}
{{--Nếu giá trị ít text thì viết trên 1 dòng như sau:--}}
@section('page_title', 'Form sửa danh mục')
{{--Nếu giá trị nhiều text, thì viết như sau:--}}
@section('content')
    {{--Do Laravel quy định khi thêm mới vào DB phải dùng
    route post nên cần set url đúng như khai báo route--}}
    <form action="{{ url('category/' . $category->id . '/update') }}"
          method="post"
          enctype="multipart/form-data" class="container">
        {{--Form trong Laravel bắt buộc phải gửi lên 1 token
        để tránh lỗi bảo mật CSRF Token--}}
        <input type="hidden" name="_token"
               value="{{ csrf_token() }}" />
        Tên danh mục:
        <input type="text" class="form-control" name="name"
        value="{{ $category->name }}"/>
        <br />
        Chi tiết danh mục:
        <textarea name="description" class="form-control">
            {{ $category->description }}
        </textarea>
        <br />
        <input type="submit" name="submit" value="Save"
               class="btn btn-primary" />
    </form>

@endsection()
