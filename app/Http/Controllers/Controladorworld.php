<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\City;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Crypt;

class ControladorWorld extends Controller{

    public function get_country(Request $req){
	    $criterio=$req['criterio'];
        // $paises=DB::SELECT("SELECT Code,Name,Region,IndepYear,Population,SurfaceArea,LifeExpectancy FROM  country where active=1 and ( name like '%$criterio%' or region like '%$criterio%') ");

	// $paises=Country::all();
        $paises=Country::where('active','=',1)
        ->where(function($query)use ($criterio){
            $query->where('name','like',"%$criterio%")->orwhere('region','like',"%$criterio%");
        })->orderBy('code','asc')
        ->paginate(15);

        $paises2=Country::where('active','=',1)->get();
        $nombre="jose";
        $nombre_enc=Crypt::encryptString($nombre);
        $nombre_dec=Crypt::decryptString($nombre_enc);

        return view('paises',['paises'=>$paises,'paises2'=>$paises2,'nombre_enc'=>$nombre_enc,'nombre_dec'=>$nombre_dec]);
        
    }

    public function eliminar (Request $req){
        $code = $req['code'];
        $eliminarpais= Country::where('code',$code)->delete();
// $eliminarpais = Country :: where('code',$code)->update(['active'=>0]);


        if($eliminarpais){
return "se elimino fisicamente $code de la base";

        }
}

public function modificar(Request $req){
    $code = $req['code'];
    $paises= Country::where('Code', $code)->get();

    return view('modificar',['paises'=>$paises]);
}

public function modificarp(Request $req)
{
    $code=$req['Code'];
    $Population=$req['Population'];
    $LifeExpectancy=$req['LifeExpectancy'];

    $modificar= Country::where('code',$code)->update(['Population'=>$Population, 'LifeExpectancy'=>$LifeExpectancy]);
// return $modificar;
    if ($modificar) {
    return redirect()->route('paises');
}

}
public function subirfoto (Request $req)
{
    $code=$req['code'];
    return view("subirfoto",['code'=>$code]);
}
public function subirfoto2(Request $req)
{
    $code=$req['code'];
    $nombre = $req->file('file')->getClientOriginalName();
    $extension=$req->file('file')->extension();
    if ($extension=='png' || $extension=='jpg') {
        $path=$req->file('file')->storeAs('banderas',$nombre);
        $subirfoto=Country::where('Code',$code)->update(['imagen'=>$nombre]);
        return redirect()->route('paises');
    }
    else {
        echo "tu archivo debe de ser pmg o jpg";
    }
}
public function consultar(Request $req)
{
    $code=$req['code'];
    $countries= Country::where("Code","$code")->get();
    echo json_encode($countries[0]);
}
public function consultar2(Request $req)
{
    $code=$req['code'];
    $cities= City::where("CountryCode","$code")->get();
    echo json_encode($cities);
}

public function ciudades(Request $req){
    $ciudades=City::all()->skip(2500)->take(100);
    // orderBy('CountryCode','asc')->paginate(2000);

    return view('ciudades',['ciudades'=>$ciudades]);
}

public function ciudades2 (Request $request){
    $term=$request->get('term');
    $busqueda=City::where('Name','like',"%$term%")->get();
    $data=[];

    foreach ($busqueda as $q) {
        $data[]=[
            'label'=>$q->Name,
            'td'=>$q->Name
        ];
    }
    return $data;
// echo json_encode($busqueda[0]);
}

public function encriptar(){
    $countries=Country::all();
    foreach ($countries as $ct) {
        $reg_enc=Crypt::encryptString($ct->Region);
    $country=Country::where('Code',$ct->Code)->update(['Region'=>$reg_enc]);
    }
    return back();
   
}
public function desencriptar(){
    $countries=Country::all();
    foreach ($countries as $ct) {
        $reg_dec=Crypt::decryptString($ct->Region);
    $country=Country::where('Code',$ct->Code)->update(['Region'=>$reg_dec]);
    }
    return back();
   
}


}



 ?>
