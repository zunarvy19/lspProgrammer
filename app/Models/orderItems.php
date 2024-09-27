<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'id_menu',
        'quantity',
        'price',
    ];

    public function menu(){
        return $this->belongsTo(menus::class, 'menu_id');
    }

    public function order(){
        return $this->belongsTo(orders::class, 'orders_id');
    }
}
