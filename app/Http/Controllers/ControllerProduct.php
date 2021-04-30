<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
//List Model Yang digunakan
use App\Product;
use App\ProductImage;
use App\ProductCategory;
use App\ProductCategoryDetail;

class ControllerProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //Menampilkan daftar Product
        $products = Product::with('RelasiProductCategory','RelasiProductImage')->get();
        return view ('admin.list-product',compact (['products']));
        // return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman penambahan data product
        $productCategorys = ProductCategory::all();
        if ($productCategorys->isEmpty()){
            return redirect('/product')->with('error','Tidak ada data Kategori');
        }else{
            return view ('admin.create-product', compact(['productCategorys']));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan data di tabel product
        if(Product::where('product_name',$request->nama_product)->exists()){
            return redirect('/product')->with('gagal','Gagal menambahkan data, data barang sudah terdaftar');
        }
        $products = new Product;
        $products->product_name = $request->nama_barang;
        $products->price = $request->harga_product;
        $products->description = $request->deskripsi_product;
        $products->stock = $request->stock_product;
        $products->weight = $request->berat_product;
        $products->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $products->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $products->save();

        //Menyimpan nama gambar dan menaruh file gambar di public
        $productImage = new ProductImage;
        $productImage->product_id = $products->id; 
        $file = $request->file('gambar_product');
        $name= $file->getClientOriginalName();
        if (ProductImage::where('image_name',$name)->exists()){
            $name = uniqid().'-'.$name;
        }
        $productImage->image_name = $name;
        $productImage->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $productImage->updated_at = Carbon::now()->format('Y-m-d H:i:s'); 
        $file->move('img',$name); 
        $productImage->save();

        //Menyimpan id product dan kategori product pada detail product
        $productCategoryDetail = new ProductCategoryDetail;
        $productCategoryDetail->product_id = $products->id;
        $productCategoryDetail->category_id = $request->kategori_product;
        $productCategoryDetail->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $productCategoryDetail->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $productCategoryDetail->save();
        return redirect('/product')->with('berhasil','Anda Berhasil menambahkan data product');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan tampilan edit
        $product=Product::where('id',$id)->first(); 
        return view ('admin.edit-product',compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Memperbarui data
        Product::where('id',$id)->update([
                    'product_name'=>$request->nama_barang,
                    'price'=>$request->harga_product,
                    'description'=>$request->deskripsi_product,
                    'stock'=>$request->stock_product,
                    'weight'=>$request->berat_product,
                    'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
                ]);
        return redirect('/product')->with('berhasil','Data Product Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Memberikan peringatan jika data tidak dapat dihapus
        if(ProductImage::where('product_id',$id)->exists()){
            return redirect('/product')->with('gagal','Data Tidak dapat dihapus karenakan terdapat data yang bersangkutan');
        }   
        $product=Product::find($id);
        $product->delete();
        return redirect('/product')->with('berhasil','Data Barang Berhasil Dihapus');
    }
}
