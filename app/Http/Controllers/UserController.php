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
    Public function showAll(){
        $products= Product::with('RelasiProductCategory', 'RelasiProductImage')->get();
        return view ('user.show_all', compact(['products']));
    }
    Public function detail($id){
        $product= Product::with('RelasiProductCategory', 'RelasiProductImage')->where('id',$id)->first();
        return view ('user.detail', compact(['product']));
    }
}

