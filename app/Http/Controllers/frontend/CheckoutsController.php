<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add Models........
use App\models\Payment;
use App\models\Order;
use App\models\Card;

use Auth;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validatedData = $request->validate([
            'name' => 'required|max:30|string',
            'phone_no' => 'required|string|max:15',
            'email' => 'nullable|email:rfc,dns',
            'shipping_address' => 'required|max:30',
            'payment_method_id' => 'required',
            'message' => 'nullable|max:150'
        ],
        [
            'name.required' => 'Username must required',
            'phone_no.required' => 'Phone Number must required',
            'shipping_address.required' => 'Shipping Address must required',
            'payment_method_id.required' => 'Payment selection must required',
           
        ]
    );

        $order = new Order();

        $order->name = $request->name;
        $order->ip_address = request()->ip();
        $order->phone_no = $request->phone_no;
        if(!is_null($request->email))
        {
         $order->email = $request->email;
        }
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;

        if($request->payment_method_id != 'cash_id')
        {
            if(is_null($request->transiction_id) OR empty($request->transiction_id))
            {
                session()->flash('sticky_error','Please give your transection id for order');
                return back();
            }
            else{
                $order->transiction_id = $request->transiction_id;
            }
        }

        if(Auth::check())
        {
            $order->user_id = Auth()->id();
        }

        $order->payment_id  = Payment::where('short_name',$request->payment_method_id)->first()->id;

        $order->save();

        foreach (Card::totalCarts() as $card) {
            $card->order_id = $order->id;
            $card->save();
        }

        session()->flash('success','Your payment has taken successful. Please wait admin will confirm');
        return redirect()->route('index');

        // dd($payment_id);



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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
