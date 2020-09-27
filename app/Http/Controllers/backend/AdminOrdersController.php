<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Added..........

use App\models\Order;
use PDF;

class AdminOrdersController extends Controller
{
    // This constructor use for single authontication
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
     public function index()
    {

        $orders = Order::orderBy('id','desc')->with(['user'])->get();
        return view('backend.pages.orders.index',compact('orders'));

    }
     public function show($id)
    {

        $order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();

        return view('backend.pages.orders.show',compact('order'));

    }

    public function completed($id)
    {
    	// dd($id);

        $order = Order::find($id);
        if($order->is_completed)
        {
        	$order->is_completed = 0;
        	  $order->save();
        	  session()->flash('error','Order has successfully Cancled !!');
        }
        else{
        	$order->is_completed = 1;
        	$order->save();
        	session()->flash('success','Order has successfully Completed !!');
        }
        return back();

    }

    public function chargeUpdate(Request $request,$id)
    {

        $order = Order::find($id);
        if($request->shipping_cost < 0 || $request->custom_discount < 0)
        {
            session()->flash('error','Shipping Cost or custom discount not be a negative number !!');
            return back();
        }
        else{
            $order->shipping_cost = $request->shipping_cost;
            $order->custom_discount = $request->custom_discount;

            $order->save();

            session()->flash('success','Shipping Cost or custom discount has change');
            return back();
        }
        // dd(gettype($request->shipping_cost));

        // dd($request->shipping_cost." ".$request->custom_discount);
         
    }

    public function invoice($id)
    {
        // dd($id);
        $order = Order::find($id);

        // return view('backend.pages.orders.invoice',compact('order'));

        $pdf = PDF::loadView('backend.pages.orders.invoice',compact('order'));
        // $pdf->setPaper('a4', 'landscape');
        $pdf_name = 'invoice_#LE'.$order->id.'.pdf';

          return $pdf->stream($pdf_name);
  
       // return $pdf->download('invoice.pdf');
    }

      public function paid($id)
    {
    	// dd($id);

        $order = Order::find($id);
        if($order->is_paid)
        {
        	$order->is_paid = 0;
        	  $order->save();
        	  session()->flash('error','Paid has successfully Cancled !!');
        }
        else{
        	$order->is_paid = 1;
        	$order->save();
        	session()->flash('success','Paid has successfully Completed !!');
        }
        return back();

    }






}
