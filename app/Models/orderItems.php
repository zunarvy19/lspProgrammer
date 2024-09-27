<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',  // ID pesanan yang terkait dengan item ini
        'id_menu',   // ID menu yang dipesan
        'quantity',  // Jumlah item yang dipesan
        'price',     // Harga item saat dipesan
    ];
    public function order(){
        return $this->belongsTo(menus::class);
    }

}
