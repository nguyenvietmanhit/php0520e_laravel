<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function test() {
    echo "Phương thức test";
  }

  public function testId($id) {
    echo "Id = $id";
  }
}
