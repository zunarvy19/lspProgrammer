<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'status_order',
        'tanggal_order',
        'total_biaya',
        'metode_order',
    ];

    public function items(){
        return $this->hasMany(orderItems::class, 'orders_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'id_user'); // Pastikan 'id_user' sesuai dengan kolom foreign key di tabel orders
}
}
