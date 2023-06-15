<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $order = order::all();

        return view('order.order-data', compact('order'));
    }

    public function update(Request $request, $id) {
        $order = order::findOrFail($id);

        $order->order_status=$request->input('order_status');
        $order->payment_status=$request->input('payment_status');

        $order->save();

    if ($order->order_status == 'Ditolak' && $order->payment_status == 'Belum lunas') {
        return back()->with([
            'warning' => 'Order ditolak!',
            'warning2' => 'Order belum lunas!'
        ]);
    } elseif ($order->order_status == 'Ditolak' && $order->payment_status == 'Lunas') {
        return back()->with([
            'warning' => 'Order ditolak',
            'success' => 'Order lunas!'
        ]);
    } elseif ($order->order_status == 'Diterima' && $order->payment_status == 'Belum lunas') {
        return back()->with([
            'success' => 'Order diterima!',
            'warning' => 'Order belum lunas!'
        ]);
    } elseif ($order->order_status == 'Diterima' && $order->payment_status == 'Lunas') {
        return back()->with([
            'success' => 'Order diterima!',
            'success2' =>  'Order lunas!'
        ]);
    } elseif ($order->order_status == 'Diterima' && $order->payment_status == null) {
        return back()->with([
            'success' => 'Order diterima!'
        ]);
    } elseif ($order->order_status == 'Ditolak' && $order->payment_status == null) {
        return back()->with([
            'success' => 'Order ditolak!'
        ]);
    } elseif ($order->order_status == null && $order->payment_status == 'Belum lunas') {
        return back()->with([
            'success' => 'Belum lunas!'
        ]);
    } elseif ($order->order_status == null && $order->payment_status == 'Lunas') {
        return back()->with([
            'success' => 'Lunas!'
        ]);
    } else {
        return back()->withErrors(['warning' => 'Terjadi Error!']);
    }
}


    public function destroy(Request $request) {

        $order = $request->input('order');

        if (empty($order)) {
            return back()->with('error', 'Select the item first.');
        }

        foreach ($order as $orderId) {
            $order = Order::findOrFail($orderId);

        if ($order->proof_payment) {
            $oldFilePath = public_path('bukti/'.$order->proof_payment);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        $order->delete();
    }
        return back()->with('success', 'Order deleted.');
    }

    public function show() {
        $order = order::all();

        return view('order.order-update', compact('order'));
    }
}
