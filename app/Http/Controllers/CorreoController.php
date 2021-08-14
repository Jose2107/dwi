<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class CorreoController extends Controller
{
    public function correo(Request $req)
    {
        $data=array(
            'asunto'=>$req->asunto,
            'correo'=>$req->correo,
            'mensaje'=>$req->mensaje,
        );
Mail::to($req->correo)->send(new TestMail($data));
return view('envio');
    }
}
