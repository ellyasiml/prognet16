<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\UserNotifications;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/user');
    }

    public function userNotif($id) 
    {
        $notification = UserNotifications::find($id);
        $notif = json_decode($notification->data);
        $date = Carbon::now('Asia/Makassar');
        UserNotifications::where('id', $id)
                ->update([
                    'read_at' => $date
                ]);
        
        if ($notif->category == 'transaction') {
            return redirect()->route('order.all');
        } elseif ($notif->category == 'approved') {
            return redirect()->route('order.verified');
        } elseif ($notif->category == 'delivered') {
            return redirect()->route('order.delivered');
        } elseif ($notif->category == 'canceled') {
            return redirect()->route('order.canceled');
        } elseif ($notif->category == 'expired') {
            return redirect()->route('order.expired');
        } elseif ($notif->category == 'success') {
            return redirect()->route('order.success');
        } elseif ($notif->category == 'review') {
            return redirect()->route('detail_product', $notif->id);
        }
    }
}
