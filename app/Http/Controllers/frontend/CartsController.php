<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Add............
use App\models\Card;
use App\models\Order;
use Auth;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.cards');
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

        if(Auth::check())
        {
          $card = Card::where('user_id',Auth::id())
                        ->where('product_id',$request->product_id)
                        ->where('order_id',NULL)
                        ->first();
        }
        else{
            $card = Card::where('ip_address',request()->ip())
                        ->where('product_id',$request->product_id)
                        ->where('order_id',NULL)
                        ->first();
        }

        
        if(!is_null($card))
        {
            // here incremnt and auth save
            $card->increment('product_quantity');
        }
        else{
               $card = new Card();

            if(Auth::check())
            {
                $card->user_id = Auth::id();
            }
            $card->product_id = $request->product_id;
            $card->ip_address = request()->ip();
            $card->save();

        }
         
            session()->flash('success','Product has added to card !!');
            return back();

     
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
        $card = Card::find($id);

        if(!is_null($card))
        {
            if($request->product_quantity > 0 )
            {
                $card->product_quantity = $request->product_quantity;
            }
            else{
                session()->flash('error','Card Queantity can not less then one value');
                return back();
            }
            
            $card->save();
        }
        else{
            return redirect()->route('carts');
        }

        session()->flash('success','Card has been update successfully !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::find($id);

        if(!is_null($card))
        {
            $card->delete();
        }
        else{
            return redirect()->route('carts');
        }

        session()->flash('success','Card has been Deleted successfully !!');
        return back();
    }
}
