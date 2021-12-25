<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\materiales;
use Session;
class materialController extends Controller
{
  public function Altamaterial()
{

$consulta= materiales::orderby('idm','desc')
                ->take(1)
                ->get();
     $idsigue = $consulta[0]->idm + 1;


 return view ('altas.material')
      ->with('idsigue',$idsigue);
}
 public function Guardamaterial(Request $request)
{

$idm = $request->idm;
$material = $request->material;

$this->validate($request,[
 'material'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
]);

$material = new materiales ;
$material->idm = $request->idm;
$material->material = $request->material;
$material->activo ='Si';
$material->save();
$proceso = "Alta material";
$mensaje = "El material $request->material ha sido registrado con exito";
return view ('mensaje')
 ->with('proceso',$proceso)
 ->with('mensaje',$mensaje);
}
public function Reportematerial()
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
     $consulta = \DB::select("SELECT materiales.idm, materiales.material, materiales.activo FROM materiales");
     return view('reporte.materiales')->with('consulta', $consulta);

   }
 }
 public function a(){
   return view('principal');
 }


 public function modificarmateriales($idm)
 {
   $consulta = materiales::where('idm','=',$idm)->get();
   $idma = $consulta[0]->idm;
   return view('edita.materiales')
   ->with('consulta',$consulta[0])
   ->with('idma',$idma);
 }

 public function editarmateriales(Request $request)
 {
   $idm = $request->idm;
   $material = $request->material;

   $this->validate($request,[
     'material'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
   ]);

 $material = materiales::find($idm);
   $material->idm = $request->idm;
   $material->material = $request->material;
   $material->save();
   $proceso = "Alta material";
   $mensaje = "El material $request->material ha sido modificado";
   return view ('mensaje')
     ->with('proceso',$proceso)
     ->with('mensaje',$mensaje);
 }


 public function eliminama($idm)
{
 $empresa= \DB:: UPDATE("update materiales set activo = 'No'
 where idm= $idm");
 $proceso = "DESACTIVAR MATERIAL";
   $mensaje = "El material ha sido desactivado";
   return view ('mensaje')
 ->with('proceso',$proceso)
 ->with('mensaje',$mensaje);
}
 public function restaurama($idm)
{
 $empresa= \DB:: UPDATE("update materiales set activo = 'Si'
 where idm= $idm");
 $proceso = "Activar MATERIAL";
   $mensaje = "El material ha sido activado";
   return view ('mensaje')
 ->with('proceso',$proceso)
 ->with('mensaje',$mensaje);
}
}
