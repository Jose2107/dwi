<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Producto;

class ControladorCart extends Controller{
    
    public function add(Request $request){
        $producto = Producto::find($request->producto_id);
        Cart::add(
            $producto->id, 
            $producto->name, 
            $producto->price, 
            1,
           
        );
        return back()->with('success',"$producto->nombre ¡se ha agregado con éxito al carrito!");
    }

    public function cart(){
        return view('checkout');
    }

    public function removeitem(Request $request) {

        Cart::remove([
        'id' => $request->id,
  ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}