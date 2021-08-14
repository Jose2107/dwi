<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;	

class ControladorCarrito extends Controller
{

    public function productos(){

        $productos    =   Producto::all();
        return view('vista_carrito',compact('productos'));

    }
}