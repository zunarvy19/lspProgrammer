<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class kitchenController extends Controller
{
        public function kitchen(){
        $order = orders::count();

        return view('kasir.dashboard', [
            'title' => 'Dashboard Kasir',
            'order' => $order,
        ]);
    }
}
