<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',        // ID pengguna yang membuat pesanan
        'status_order',   // Status pesanan, misalnya: diproses, selesai
        'tanggal_order',  // Tanggal pembuatan pesanan
        'total_biaya',    // Total biaya pesanan
        'metode_order',   // Metode pembayaran, misalnya: tunai atau non-tunai
    ];
    public function items()
{
    return $this->hasMany(orderItems::class);
}
}
