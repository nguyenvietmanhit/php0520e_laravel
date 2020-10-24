<?php
/**
 * /views/categories/index.blade.php
 */
?>
@extends('layouts.main')
@section('page_title', 'Trang liệt kê danh mục')
@section('content')
    <a href="{{ url('category/create') }}">
        Thêm mới danh mục
    </a>
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th></th>
        </tr>
        @foreach($categories AS $category)
            {{--model trong Laravel hỗ trợ cả 2 cách truy
            cập thuộc tính thông qua mảng hoặc object--}}
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    {{--24/10/2020 19:40:40--}}
                    {{ date('d/M/Y H:i:s', strtotime($category->created_at)) }}
                </td>
                <td>
                    {{ date('d/M/Y H:i:s', strtotime($category->updated_at)) }}
                </td>
                <td>
                    <a href="{{ url('/category/' . $category->id . '/edit') }}">
                        Update
                    </a>
                    <a href="{{ url('/category/destroy/' . $category->id) }}"
                       onclick="return confirm('Delete?')">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    {{--Hiển thị phân trang --}}
    {{ $categories->links() }}
@endsection()
