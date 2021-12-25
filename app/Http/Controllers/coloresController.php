<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\colores;
use Session;
class coloresController extends Controller
{
  public function Altacolor()
{

$consulta= colores::orderby('idcolor','desc')
                 ->take(1)
                 ->get();
      $idsigue = $consulta[0]->idcolor + 1;


  return view ('altas.colores')
       ->with('idsigue',$idsigue);
}
  public function Guardacolor(Request $request)
{

$idcolor = $request->idcolor;
$color = $request->color;

$this->validate($request,[
  'color'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
]);

$color = new colores ;
$color->idcolor = $request->idcolor;
$color->color = $request->color;
$color->activo ='Si';
$color->save();
$proceso = "Alta Color";
$mensaje = "El color $request->color ha sido registrado con exito";
return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
public function Reportecolor()
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

    $consulta = \DB::select("SELECT colores.idcolor, colores.color, colores.activo FROM colores
    AS colores");
        return view('reporte.colores')->with('consulta', $consulta);
      }
    }



  public function modificacolores($idcolor)
  {
    $consulta = colores::where('idcolor','=',$idcolor)->get();
    $idcolo = $consulta[0]->idcolor;
    return view('edita.colores')
    ->with('consulta',$consulta[0])
    ->with('idcolo',$idcolo);
  }
  public function editarcolor(Request $request)
  {
    $idcolor = $request->idcolor;
    $color = $request->color;

    $this->validate($request,[
      'color'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    ]);

    $color = colores::find($idcolor);
    $color->idcolor = $request->idcolor;
    $color->color = $request->color;
    $color->save();
    $proceso = "Alta Color";
    $mensaje = "El color $request->color ha sido modificado";
    return view ('mensaje')
      ->with('proceso',$proceso)
      ->with('mensaje',$mensaje);
  }

  public function eliminacol($idcolor)
{
  $empresa= \DB:: UPDATE("update colores set activo = 'No'
  where idcolor= $idcolor");
  $proceso = "DESACTIVAR COLOR";
    $mensaje = "El color ha sido desactivado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
  public function restauracol($idcolor)
{
  $empresa= \DB:: UPDATE("update colores set activo = 'Si'
  where idcolor= $idcolor");
  $proceso = "ACTIVAR COLOR";
    $mensaje = "El color ha sido activado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}

}
