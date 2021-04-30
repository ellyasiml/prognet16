<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
//List Model Yang digunakan
use App\ProductCategory;

class ControllerProductCategory extends Controller
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
        //Menampilkan daftar Product Category
        $productCategorys = ProductCategory::all();
        return view ('admin.list-product-category',compact (['productCategorys']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman penambahan data product Category
        return view ('admin.create-product-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan data courier
        if(ProductCategory::where('category_name',$request->nama_category)->exists()){
            return redirect('/product-category')->with('gagal','Gagal menambahkan data, data kategori sudah terdaftar');
        }
        $productCategory = new ProductCategory;
        $productCategory->category_name = $request->nama_category;
        $productCategory->save();
        return redirect('/product-category')->with('berhasil','Anda Berhasil menambahkan data kategori');
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
        $productCategory=ProductCategory::where('id',$id)->first(); 
        return view ('admin.edit-product-category',compact(['productCategory']));
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
        //Mmeperbarui data
        ProductCategory::where('id',$id)->update([
                    'category_name'=>$request->nama_category,
                    'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
                ]);
        return redirect('/product-category')->with('berhasil','Data Kategori Berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus data
        $productCategory=ProductCategory::find($id);
        $productCategory->delete();
        return redirect('/product-category')->with('berhasil','Data Kategori Berhasil Dihapus');
    }
}
