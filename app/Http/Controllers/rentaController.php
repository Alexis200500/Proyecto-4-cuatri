<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rentas;
use App\estados;
use App\clientes;
use App\eventos;
use App\tipoeventos;
use Session;
class rentaController extends Controller
{
  public function Altarentas()
   {
   $consulta= rentas::orderby('idr','desc')
              ->take(1)
              ->get();
   $idsigue = $consulta[0]->idr + 1;

   $cl = clientes::WHERE('idcl','>=',1)
   ->orderby('nombre','ASC')->get();

   $eve = eventos::WHERE('idev','>=',1)
   ->orderby('idev','ASC')->get();

   $estados = estados::WHERE('ide','>=',1)
         ->orderby('estado','ASC')->get();
   return view ('altas.rentas')
   ->with('idsigue',$idsigue)
   ->with('eve',$eve)
   ->with('cl',$cl)
   ->with('estados',$estados);
   }

   public function Guardarentas(Request $request)
{

$idr = $request->idr;
$idcl = $request->idcl;
$idev = $request->idev;
$direccion = $request->direccion;
$ide = $request->ide;
$fecharentar = $request->fecharentar;
$costo = $request->costo;
$cantpersona = $request->cantpersona;

$this->validate($request,[
 'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
 'costo'=> 'required|integer',
 'cantpersona'=>'required|integer',
]);

$ren = new rentas;
$ren->idr = $request->idr;
$ren->idcl = $request->idcl;
$ren->idev = $request->idev;
$ren->direccion = $request->direccion;
$ren->ide = $request->ide;
$ren->fecharentar = $request->fecharentar;
$ren->activo ='Si';
$ren->costo = $request->costo;
$ren->cantpersona = $request->cantpersona;
$ren->save();
$proceso = "Alta Renta";
$mensaje = "La renta ha sido registrado con exito";
return view ('mensaje')
 ->with('proceso',$proceso)
 ->with('mensaje',$mensaje);
}


public function Reporterentas()
 {
   $sname = Session::get('sesionname');
      $sidu = Session::get('sesionidu');
      $stipo = Session::get('sesiontipo');

      if($sname == '' or $sidu == '' or $stipo == '')
      {
          Session::flash('Error', 'Es necesario loguearse antes de continuar');
          return redirect()->route('login');
      }
      else
      {

   $consulta = \DB::select("SELECT rentas.idr, clientes.nombre as nombre,
      rentas.idev,rentas.direccion, estados.estado as estado, rentas.fecharentar,
     rentas.costo,rentas.cantpersona, rentas.activo FROM rentas
     AS rentas INNER JOIN estados AS estados ON estados.ide = rentas.idr
     INNER JOIN clientes AS clientes ON clientes.idcl = rentas.idr ");
       return view('reporte.rentas')->with('consulta', $consulta);

     }
 }
public function modificarentas($idr)
{
$consulta = rentas::where('idr','=',$idr)->get();

$idre = $consulta[0]->idcl;
$nombrerenta = clientes::where('idcl','=',$idre)->get();
$nomren = $nombrerenta[0]->nombre;
$clientes = clientes::where('nombre','!=', $consulta[0]->idcl)->get();

//eventos
$idrev = $consulta[0]->idev;
$nombreevento = eventos::where('idev','=',$idrev)->get();
$nomeve = $nombreevento[0]->idev;
$eventos = eventos::where('idev','!=', $consulta[0]->idev)->get();

//estados

$ides = $consulta[0]->ide;
$nombres = estados::where('ide','=',$ides)->get();
$est = $nombres[0]->estado;
$estados = estados::where('estado','!=', $consulta[0]->ide)->get();

return view('edita.rentas')
->with('consulta',$consulta[0])
->with('clientes',$clientes)
->with('idre',$idre)
->with('nomren',$nomren)

->with('estados',$estados)
->with('ides',$ides)
->with('est',$est)
->with('nombres',$nombres)

->with('eventos',$eventos)
->with('idrev',$idrev)
->with('nomeve',$nomeve);

}

public function editarentas(Request $request)
{
$idr = $request->idr;
$idcl = $request->idcl;
$idev = $request->idev;
$direccion = $request->direccion;
$ide = $request->ide;
$fecharentar = $request->fecharentar;
$costo = $request->costo;
$cantpersona = $request->cantpersona;

$this->validate($request,[
  'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
  'costo'=> 'required|integer',
  'cantpersona'=>'required|integer',
]);

  $ren = rentas::find($idr);
$ren->idr = $request->idr;
$ren->idcl = $request->idcl;
$ren->idev = $request->idev;
$ren->direccion = $request->direccion;
$ren->ide = $request->ide;
$ren->fecharentar = $request->fecharentar;
$ren->costo = $request->costo;
$ren->cantpersona = $request->cantpersona;
$ren->save();
$proceso = "modifica Renta";
$mensaje = "La renta ha sido modificada";
return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}

public function eliminare($idr)
{
$empresa= \DB:: UPDATE("update rentas set activo = 'No'
where idr= $idr");
$proceso = "DESACTIVAR RENTA";
$mensaje = "La renta ha sido desactivada";
return view ('mensaje')
->with('proceso',$proceso)
->with('mensaje',$mensaje);
}
public function restaurare($idr)
{
$empresa= \DB:: UPDATE("update rentas set activo = 'Si'
where idr= $idr");
$proceso = "Activar RENTA";
$mensaje = "La renta ha sido activada";
return view ('mensaje')
->with('proceso',$proceso)
->with('mensaje',$mensaje);
}

}
