<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = [
        'user_id',
        'payment_id',
        'ip_address',
        'name',
        'phone_no',
        'shipping_address',
        'email',
        'message',
        'is_paid',
        'is_completed',
        'is_seen_by_admin',
        'transiction_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    	// OR
    	// return $this->belongsTo(App\models\test\User::class);
    }

    // One Order have one payment method in belogsTo
     public function payment()
    {
        return $this->belongsTo(Payment::class);
        // OR
        // return $this->belongsTo(App\models\test\User::class);
    }

    public function cards()
    {
    	// one order have many cards.........
    	return $this->hasMany(Card::class,'order_id','id');
    	// OR
    	// return $this->belongsTo(App\models\test\User::class);
    }

}
