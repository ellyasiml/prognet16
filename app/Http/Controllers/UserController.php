<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Courier;
use App\Discount;
use App\Product;
use App\ProductReview;
use App\Transaction;
use App\TransactionDetail;
use App\Admin;
use App\User;
use Illuminate\Support\Carbon;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use DB;

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
        $product= Product::with('RelasiProductCategory', 'RelasiProductImage', 'review', 'review.response')->where('id',$id)->first();
        return view ('user.detail', compact(['product']));
    }
    public function logout(Request $request){
        // $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    public function transaksiLangsung($id){
        $courier = Courier::all();
        $product= Product::with('RelasiProductCategory','RelasiProductImage')->where('id',$id)->first();
        return view ('user.transaksi-langsung',compact(['product','courier']));
    }

    function province(){
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        echo json_encode($daftarProvinsi);
    }

    function city($param){
        $daftarProvinsi = RajaOngkir::kota()->dariProvinsi($param)->get();
        echo json_encode($daftarProvinsi);
    }

    function getongkir($ct, $cf, $k, $b){
        $daftarProvinsi = RajaOngkir::ongkosKirim([
            'origin'        => $cf,     // ID kota/kabupaten asal
            'destination'   => $ct,      // ID kota/kabupaten tujuan
            'weight'        => $b,    // berat barang dalam gram
            'courier'       => $k    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        echo json_encode($daftarProvinsi);
    }
    
    function berirating(Request $req){
        $req->validate([
            'product_id' => 'required',
            'rate' => 'required',
            'content' => 'required'
        ]);

        $detail = TransactionDetail::where('transaction_id', $req->product_id)->get();

        foreach($detail as $det){
            ProductReview::create([
                'product_id' => $det->product_id,
                'user_id' => Auth::user()->id,
                'rate' => $req->rate,
                'content' => $req->content
            ]);

            //Notif Admin
            $admin = Admin::find(1);
            $data = [
                'nama'=> Auth::user()->name,
                'message'=>'mereview product!',
                'id'=> $det->product_id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $admin->createNotif($data_encode);
        }
        return redirect('/user/transaksi/'.Auth::user()->id)->with('success', 'Rating berhasil diberikan');
    }

    function canceltrans($id){
        Transaction::where('id', $id)->update([
            'status' => 'canceled'
        ]);
        return redirect('/user/transaksi/'.Auth::user()->id)->with('success', 'Cancel transaksi berhasil dilakukan');
    }

    function buynow(Request $req){
        $req->validate([
            'jumlah_total' => 'required|min:1',
            'alamat_pengguna' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kurir' => 'required',
            'ongkir' => 'required',
        ],[
            'jumlah_total.required' => 'Masukkan jumlah yang ingin dibeli',
            'jumlah_total.min' => 'Jumlah yang dibeli minimal satu',
            'alamat_pengguna.required' => 'Alamat tidak boleh kosong',
            'provinsi.required' => 'Provinsi tidak boleh kosong',
            'kabupaten.required' => 'Kabupaten tidak boleh kosong',
            'kurir.required' => 'Pilih kurir terlebih dahulu'
        ]);

        $harga = Product::where('id', $req->id_produk)->get('price');
        $diskon = Discount::where('id_product', $req->id_produk)->where('start', '<=', date('Y-m-d', strtotime(now())))->where('end', '>=', date('Y-m-d', strtotime(now())))->first();

        if ($diskon != null) {
            $disc = ($diskon->percentage/100)*$harga[0]->price;
        }else{
            $disc = 0;
        }

        $idtrans = Transaction::create([
            'timeout' => date('Y-m-d H:i:s', strtotime('+3 days')),
            'address' => $req->alamat_pengguna,
            'regency' => $req->regency,
            'province' => $req->province,
            'total' => floatval($harga[0]->price) * $req->jumlah_total + $req->ongkir - $disc,
            'shipping_cost' => $req->ongkir,
            'sub_total' => floatval($harga[0]->price) * $req->jumlah_total,
            'user_id' => Auth::user()->id,
            'courier_id' => $req->kurir,
            'status' => 'unverified'
        ])->id;

        TransactionDetail::create([
            'transaction_id' => $idtrans,
            'product_id' => $req->id_produk,
            'qty' => $req->jumlah_total,
            'discount' => $disc,
            'selling_price' => floatval($harga[0]->price)
        ]);

        return redirect('/user/transaksi-langsung/'.$req->id_produk)->with('success', 'Pembelian berhasil silahkan cek transaksi anda');
    }

    function addcart($id){
        $cek = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->count();

        if ($cek > 0) {
            $data = Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
            Cart::where('product_id', $id)->where('user_id', Auth::user()->id)->update([
                'qty' => $data->qty + 1
            ]);
        }else{
            Cart::create([
                'product_id' => $id,
                'user_id' => Auth::user()->id,
                'qty' => '1'
            ]);
        }

        return redirect('/user')->with('success', 'Produk berhasil ditambahkan silahkan cek keranjang anda');
    }

    function listcart(){
        $data['product'] = Cart::with(['produk','produk.RelasiProductImage'])->where('carts.user_id', Auth::user()->id)->where('carts.status', null)->get();
        $data['courier'] = Courier::all();
        // dd($data['product']);
        return view('user.cart', $data);
    }

    function getberat($id){
        echo json_encode(Cart::join('products', 'carts.product_id','products.id')->select('carts.qty','products.weight')->where('user_id', $id)->get());
    }

    function checkout(Request $req){
        $req->validate([
            'alamat' => 'required',
            'regency' => 'required',
            'province' => 'required',
            'kurir' => 'required',
        ]);

        $cart = Cart::join('products', 'carts.product_id','products.id')->select('carts.*', 'products.price')->where('user_id', Auth::user()->id)->get();        
        $total = 0;

        foreach ($cart as $c) {
            $diskon = Discount::where('id_product', $c->product_id)->where('start', '<=', date('Y-m-d', strtotime(now())))->where('end', '>=', date('Y-m-d', strtotime(now())))->first();

            if ($diskon != null) {
                $total += ($c->price * $c->qty) - ($c->price*($diskon->percentage/100));
            }else{
                $total += $c->price * $c->qty; 
            }

        }

        $idtrans = Transaction::create([
            'timeout' => date('Y-m-d H:i:s', strtotime('+1 days')),
            'address' => $req->alamat,
            'regency' => $req->regency,
            'province' => $req->province,
            'total' => floatval($total) + $req->ongkir,
            'shipping_cost' => $req->ongkir,
            'sub_total' => floatval($total),
            'user_id' => Auth::user()->id,
            'courier_id' => $req->kurir,
            'status' => 'unverified'
        ]);

        foreach ($cart as $c) {
            $d = Discount::where('id_product', $c->product_id)->where('start', '<=', date('Y-m-d', strtotime(now())))->where('end', '>=', date('Y-m-d', strtotime(now())))->first();
            if ($d== null) {
                $persen = 0;
            }else{
                $persen = $d->percentage;
            }
            TransactionDetail::create([
                'transaction_id' => $idtrans->id,
                'product_id' => $c->product_id,
                'qty' => $c->qty,
                'discount' => $c->price*($persen/100),
                'selling_price' => floatval($c->price)
            ]);

            Cart::where('id', $c->id)->delete();
        }

        $transaksi_id = $idtrans->id;

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama'=> Auth::user()->name,
            'message'=>'melakukan transaksi!',
            'id'=> $transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        return redirect('/user/transaksi/'.Auth::user()->id)->with('success', 'Checkout keranjang berhasil, liat transaksi anda sekarang');
    }

    function terimabarang($id){
        Transaction::where('id', $id)->update([
            'status' => 'success'
        ]);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        foreach ($detail as $key) {
            $produk = Product::where('id', $key->product_id)->first();
            Product::where('id', $key->product_id)->update([
                'stock' => $produk->stock - $key->qty
            ]);
        }
        return redirect('/user/transaksi/'.Auth::user()->id)->with('success', 'Berhasil terima barang');
    }

    function ubahjumlah(Request $req){
        $req->validate([
            'qty' => 'required|min:1'
        ],[
            'qty.required' => 'Jumlah harus diisi',
            'qty.min' => 'Jumlah minimal satu'
        ]);

        Cart::where('id', $req->id)->update([
            'qty' => $req->qty
        ]);

        return redirect('/user/cart/'.Auth::user()->id)->with('success', 'Berhasil mengubah jumlah');
    }

    function hapuscart(){
        Cart::findOrFail($_GET['id']);
        Cart::where('id', $_GET['id'])->delete();

        return redirect('/user/cart/'.Auth::user()->id)->with('success', 'Berhasil menghapus item');
    }

    function mytransaction($id){
        return view('user.transaksi');
    }

    function datatrans($stat, $id){
        $data = Transaction::where('user_id', $id)->where('status', $stat)->get();
        echo json_encode($data);
    }

    function uploadbukti(Request $req){
        $req->validate([
            'bukti' => 'required'
        ]);

        $user_id = Auth::id();
        $user = User::find($user_id);

        $file = $req->file('bukti');

        if ($file->getClientOriginalExtension() != 'jpg') {
            return redirect('/user/transaksi/'.Auth::user()->id)->with('gagal', 'Gagal mengunggah bukti pembayaran, format file salah (harus jpg)');
        }else{

            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'bukti';

            $file->move($tujuan_upload,$namafile);

            Transaction::where('id', $req->id)->update([
                'proof_of_payment' => $namafile
            ]);

            //Notif Admin
            $admin = Admin::find(1);
            $data = [
                'nama'=> $user->name,
                'message'=>'mengupload bukti pembayaran!',
                'id'=> $req->id,
                'category' => 'transaction'
            ];

            $data_encode = json_encode($data);
            $admin->createNotif($data_encode);

            return redirect('/user/transaksi/'.Auth::user()->id)->with('success', 'Berhasil mengunggah bukti pembayaran');
        }

    }

    function getdetail($id){
        $data = TransactionDetail::join('products','transaction_details.product_id', 'products.id')->where('transaction_id', $id)->select('transaction_details.*','products.product_name')->get();
        echo json_encode($data);
    }

}


