<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class UserController extends Controller
{
    public function index(){
        $products= Product::with('RelasiProductCategory', 'RelasiProductImage')->orderBy('id', 'desc')->take(3)->get();
        return view ('user.index', compact(['products']));
    }
}
