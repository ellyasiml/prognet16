<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionDetail;
use App\ProductReview;
use App\Response;
use Illuminate\Support\Carbon;
use App\AdminNotifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function __construct()
        {
            $this->middleware('auth:admin');
        }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    function listtrans($param){
        $data['trans'] = Transaction::join('users','transactions.user_id', 'users.id')->select('transactions.*', 'users.name')->where('transactions.status', $param)->get();
        return view('admin.list-transaction', $data);
    }

    function ubahstatus($param, $id){
        $transaction = Transaction::find($id);
        $user = User::find($transaction->user_id);

        if ($param == 'expired' || $param == 'canceled') {
            TransactionDetail::where('transaction_id', $id)->delete();
            Transaction::where('id', $id)->delete();
            return redirect('/transaction/'.$param)->with('berhasil', "Berhasil hapus transaksi");
        }else{
            if ($param == 'unverified') {
                Transaction::where('id', $id)->update([
                    'status' => 'verified'
                ]);

                //Notif User
                $data = [
                    'nama'=> $user->name,
                    'message'=>'Pesanan terverifikasi!',
                    'id'=> $id,
                    'category' => 'approved'
                ];
                $data_encode = json_encode($data);
                $user->createNotifUser($data_encode);

            }else if ($param == 'verified') {
                Transaction::where('id', $id)->update([
                    'status' => 'delivered'
                ]);

                //Notif User
                $data = [
                    'nama'=> $user->name,
                    'message'=>'Pesanan dalam perjalanan!',
                    'id'=> $id,
                    'category' => 'delivered'
                ];
                $data_encode = json_encode($data);
                $user->createNotifUser($data_encode);
            }
            return redirect('/transaction/'.$param)->with('berhasil', "Berhasil ubah status transaksi");
        }
    }

    function listreview(){
        $data['review'] = ProductReview::join('users', 'product_reviews.user_id', 'users.id')->join('products', 'product_reviews.product_id', 'products.id')->select('product_reviews.*', 'users.name','products.product_name')->get();
        return view('admin.list-review', $data);
    }

    function beritanggapan(Request $req){
        $req->validate([
            'content' => 'required'
        ]);

        $review = ProductReview::find($req->id);
        $user = User::find($review->user_id);

        Response::create([
            'review_id' => $req->id,
            'admin_id' => Auth::user()->id,
            'content' => $req->content
        ]);

        //Notif User
        $data = [
            'nama'=> $user->name,
            'message'=>'Review diresponse!',
            'id'=> $review->id,
            'category' => 'review'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return redirect("/products");

        return redirect('/review')->with('berhasil', "Berhasil memberi tanggapan");
    }

    function laporanperbulan(){
        if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $data['laporan'] =  DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('DATE(created_at) as tanggal'))->whereMonth('created_at', $_GET['bulan'])->whereYear('created_at', $_GET['tahun'])->groupBy('tanggal')->get();
            $data['bulan'] = $_GET['bulan'];
            $data['tahun'] = $_GET['tahun'];
        }else{
            $data['laporan'] = DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('DATE(created_at) as tanggal'))->whereMonth('created_at', date('m', strtotime(now())))->whereYear('created_at', date('Y', strtotime(now())))->groupBy('tanggal')->get();
            $data['bulan'] = date('m', strtotime(now()));
            $data['tahun'] = date('Y', strtotime(now()));
        }
        return view('admin.laporan-perbulan', $data);
    }

    function printbulanan(){
        $data['laporan'] =  DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('DATE(created_at) as tanggal'))->whereMonth('created_at', $_GET['bulan'])->whereYear('created_at', $_GET['tahun'])->groupBy('tanggal')->get();
        $data['bulan'] = $_GET['bulan'];
        $data['tahun'] = $_GET['tahun'];
        return view('admin.print-perbulan', $data);
    }

    function laporanpertahun(){
        if (isset($_GET['tahun'])) {
            $data['laporan'] =  DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('MONTH(created_at) as bulan'))->whereYear('created_at', $_GET['tahun'])->groupBy('bulan')->get();
            $data['tahun'] = $_GET['tahun'];
        }else{
            $data['laporan'] =  DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('MONTH(created_at) as bulan'))->whereYear('created_at', date('Y', strtotime(now())))->groupBy('bulan')->get();
            $data['tahun'] = date('Y', strtotime(now()));
        }
        return view('admin.laporan-pertahun', $data);
    }

    function printtahunan(){
        $data['laporan'] =  DB::table('transactions')->select(DB::raw('count(*) as jumlah'), DB::raw('MONTH(created_at) as bulan'))->whereYear('created_at', $_GET['tahun'])->groupBy('bulan')->get();
        $data['tahun'] = $_GET['tahun'];
        $data['tahun'] = $_GET['tahun'];
        return view('admin.print-pertahun', $data);
    }

    public function adminNotif($id) 
    {
        $notification = AdminNotifications::find($id);
        $notif = json_decode($notification->data);
        $date = Carbon::now('Asia/Makassar');
        AdminNotifications::where('id', $id)
                ->update([
                    'read_at' => $date
                ]);
        
        if ($notif->category == 'transaction') {
            return redirect()->route('transactions.detail', $notif->id);
        } elseif ($notif->category == 'review') {
            return redirect('/review');
        } 
    }
}
