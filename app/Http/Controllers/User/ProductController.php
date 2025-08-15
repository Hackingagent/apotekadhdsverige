<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct() {
        return view('products.index');
    }

    public function showCategory(){
        return view('products.category');
    }
}
