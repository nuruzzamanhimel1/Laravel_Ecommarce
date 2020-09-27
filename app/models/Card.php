<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

// Add..........
use Auth;

class Card extends Model
{
   public $fillable = ['product_id','user_id','order_id','ip_address','product_quantity'];

    public function user()
    {
    	// one to one
    	return $this->belongsTo(User::class);
    	// OR
    	// return $this->belongsTo(App\models\test\User::class);
    }

     public function product()
    {
    	// one to one
    	return $this->belongsTo(Product::class);
    	// OR
    	// return $this->belongsTo(App\models\test\User::class);
    }

    public function order()
    {
    	// one to one
    	return $this->belongsTo(Order::class);
    	// OR
    	// return $this->belongsTo(App\models\test\User::class);
    }


    // Custom funciton

      /**
     * Total Items of cards...........
     */

    public static function totalCarts()
    {
         
        if(Auth::check())
        {
          $cards = Card::Where('user_id',Auth::id())->orWhere('ip_address',request()->ip())->where('order_id',NULL)->with(['user','product','order'])->get();  
        }
        else{
            $cards = Card::where('ip_address',request()->ip())
                         ->where('order_id',NULL)
                         ->with(['user','product','order'])
                        ->get();  
        }
        return $cards;
    }


    /**
     * Total Items of cards...........
     */

    public static function totalItems()
    {
         
        $cards = Card::totalCarts();
        $totalTime = 0;

        foreach ($cards as $card ) 
        {
            $totalTime += $card->product_quantity;
        }

        return $totalTime;
    }



}
