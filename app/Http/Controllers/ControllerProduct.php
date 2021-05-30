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
        if($request->hasFile('gambar_product')){
            foreach ($request->file('gambar_product') as $gambar){
                $productImage = new ProductImage;
                $productImage->product_id = $products->id; 
                $name= $gambar->getClientOriginalName();
                if (ProductImage::where('image_name',$name)->exists()){
                    $name = uniqid().'-'.$name;
                }
                $productImage->image_name = $name;
                $productImage->created_at = Carbon::now()->format('Y-m-d H:i:s');
                $productImage->updated_at = Carbon::now()->format('Y-m-d H:i:s'); 
                $gambar->move('img',$name);
                $productImage->save();
            }
        }

        //Menyimpan id product dan kategori product pada detail product
        
        foreach ($request->kategori as $row){
            $productCategoryDetail = new ProductCategoryDetail;
            $productCategoryDetail->product_id = $products->id;
            $productCategoryDetail->category_id = $row;
            $productCategoryDetail->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $productCategoryDetail->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $productCategoryDetail->save();
        }
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
        $product = Product::with('RelasiProductCategory','RelasiProductImage')->where('id',$id)->first(); 
        return view ('admin.detail-product',compact (['product']));
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
        $productCategorys = ProductCategory::all();
        $productCategoryDetail = ProductCategoryDetail::where('product_id',$id)->pluck('category_id')->toArray();
        return view ('admin.edit-product',compact(['product','productCategorys','productCategoryDetail']));
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
        ProductCategoryDetail::where ('product_id', $id)->delete();
        foreach ($request->kategori as $row){
            $productCategoryDetail = new ProductCategoryDetail;
            $productCategoryDetail->product_id = $id;
            $productCategoryDetail->category_id = $row;
            $productCategoryDetail->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $productCategoryDetail->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $productCategoryDetail->save();
        }
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
        // if(ProductImage::where('product_id',$id)->exists()){
        //     return redirect('/product')->with('gagal','Data Tidak dapat dihapus karenakan terdapat data yang bersangkutan');
        // }
        $product=Product::find($id);
        $product->delete();
        return redirect('/product')->with('berhasil','Data Barang Berhasil Dihapus');
    }


    //menampilkan data product yang sudah dihapus
    public function trash()
    {
        //mengambil data product yang sudah dihapus
        $product = Product::onlyTrashed()->get();
        return view('admin.product-trash', compact(['product']));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->where('id',$id);
        $product->restore();

        return redirect('/product');
    }

    public function restore_all()
    {
        $product = Product::onlyTrashed();
        $product->restore();

        return redirect('/product')->with('berhasil', 'Data Berhasil Dikembalikan !');
    }

    public function hapus($id)
    {
        $product = Product::onlyTrashed()->where('id',$id);
        $product->forceDelete();

        return redirect('/product-trash')->with('berhasil', 'Data Berhasil Dihapus !');
    }

    public function hapus_semua()
    {
        $product = Product::onlyTrashed();
        $product->forceDelete();

        return redirect('product-trash');
    }

    public function editGambar($id)
    {
        //Menampilkan tampilan edit gambar
        $images = ProductImage::where('product_id',$id)->get(); 
        return view ('admin.edit-gambar',compact(['images']));
    }

    public function updateGambar(Request $request,$id)
    {
        //Menampilkan tampilan edit gambar
        $name= $request->gambar_product->getClientOriginalName();
        if (ProductImage::where('image_name',$name)->exists()){
            $name = uniqid().'-'.$name;
        };
        $request->gambar_product->move('img',$name);
        ProductImage::where('id',$id)->update([
            'image_name'=>$name   
        ]);
        return redirect('/gambar/'.$id);
    }

    public function review_product($id, Request $request)
    {
        $request->validate([
            'rate' => ['required'],
            'content' => ['required', 'max:100']
        ]);

        $user = Auth::user();
        $review = new Product_Review();
        $review->product_id = $id;
        $review->user_id = $user->id;
        $review->rate = $request->rate;
        $review->content = $request->content;
        if($review->save()){
            $product = Product::find($id);
            $avg_rate = DB::select('SELECT AVG(rate) as avg_rate FROM product_reviews WHERE product_id=?', [$id]);
            $avg_rate = json_decode(json_encode($avg_rate), true);
            $product->product_rate = (int)round($avg_rate[0]["avg_rate"]);
            $product->save();

            $admin = Admin::find(2);
            $details = [
                'order' => 'Review',
                'body' => 'User has review our Product!',
                'link' => url(route('product.edit',['id'=> $id])),
            ];

            return redirect()->back()->with("Success", "Successfully Comment");
        }
        return redirect()->back()->with("error", "Failed Comment");
    }
}
