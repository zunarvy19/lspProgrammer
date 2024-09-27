<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menus extends Model
{
    use HasFactory;

    protected $table = 'menuses';

    public function products(){
        return $this -> belongsTo(products::class);
    }
}
