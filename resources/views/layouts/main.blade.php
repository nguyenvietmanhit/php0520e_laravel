{{--resources/views/layouts/main.blade.php--}}
        <!DOCTYPE html>
<html>
<head>
    {{--Set tham số động cho title của trang--}}
    <title>@yield('page_title')</title>
    {{--Để echo trong blade dùng cú pháp {{  }}  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <script src="{{ asset('js/app.js')  }}"></script>
</head>
<body>
<div class="header">
    <h1>HEADER</h1>
</div>
<div class="main">
    {{--Hiển thị lỗi validate trong file layout
    , laravel đã tự sinh 1 biến chứa tất cả lỗi validate: errors
    --}}
  <?php
  //        echo "<pre>";
  //        print_r($errors);
  //        echo "</pre>";
  ?>
    @if($errors->any())
        @foreach($errors->all() AS $error)
            <div class="alert alert-danger">
              <?php
              //              echo htmlentities('abc');
              ?>
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    {{--Khai báo tham số động cho nội dung của từng view--}}
    @yield('content')
</div>
<div class="footer">
    <h1>Footer</h1>
</div>
</body>
</html>