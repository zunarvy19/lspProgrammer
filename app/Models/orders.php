<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_biaya',      
        'metode_order',   
        'notes',
        'status',
    ];
    public static $statuses = [
        'Diterima',
        'diproses',
        'Siap Ambil',
        'Sudah bayar'

    ];
    // public function items(){
    //     return $this->hasMany(orderItems::class, 'orders_id');
    // }

public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

        public function details()
    {
        // 'details' adalah nama relasi yang kita gunakan di controller: Order::with('details.menu')
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

}
