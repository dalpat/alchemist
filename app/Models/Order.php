<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static function getSales()
    {
        return (new static)::with(['items','buyer'])->where('seller_id', auth()->id())->get();
    }

    public static function getOrders()
    {
        return (new static)::with(['items','seller'])->where('buyer_id', auth()->id())->get();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['order_number', 'buyer_id', 'seller_id'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
