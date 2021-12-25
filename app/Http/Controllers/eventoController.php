<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\eventos;
use App\tipoeventos;
use App\estados;
use App\admins;
use App\clientes;
use Session;
class eventoController extends Controller
{
  public function Altaeventos(){
  $consulta= eventos::orderby('idev','desc')
                 ->take(1)
                 ->get();
      $idsigue = $consulta[0]->idev + 1;


      $tip = tipoeventos::WHERE('idte','>=',1)
                        ->orderby('evento','ASC')->get();
                        $estados = estados::WHERE('ide','>=',1)
                                          ->orderby('estado','ASC')->get();
                        $clie = clientes::WHERE('idcl','>=',1)
                                          ->orderby('nombre','ASC')->get();

  $ad = admins::WHERE('idpue','>=',1)
  ->orderby('nombre','ASC')->get();

      return view ('altas.eventos')
      ->with('idsigue',$idsigue)
      ->with('estados',$estados)
      ->with('clie',$clie)
      ->with('ad',$ad)
      ->with('tip',$tip);
}
public function Guardaeventos(Request $request)
{

  $idad = $request->idad;
  $idcl = $request->idcl;
  $idte = $request->idte;
  $direccion= $request->direccion;
  $ide = $request->ide;
  $fechaevento = $request->fechaevento;
  $costo = $request->costo;
  $cantpersona = $request->cantpersona;
  $ide = $request->ide;


  $this->validate($request,[
    'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
    'costo'=> 'required|integer',
    'cantpersona'=>'required|integer',


  ]);

  $ev = new eventos;
  $ev->idad = $request->idad;
  $ev->idcl = $request->idcl;
  $ev->idte = $request->idte;
  $ev->direccion = $request->direccion;
  $ev->ide = $request->ide;
  $ev->fechaevento = $request->fechaevento;
  $ev->costo = $request->costo;
  $ev->activo ='Si';
  $ev->cantpersona = $request->cantpersona;
  $ev->idad = $request->idad;

  $ev->save();
  $proceso = "Alta evento";
  $mensaje = "El evento ha sido registrado con exito";
  return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);

}


public function Reporteeventos()
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
    $consulta = \DB::select("SELECT eventos.idev, clientes.nombre as nombre,
      tipoeventos.evento as evento,
       eventos.direccion, estados.estado as estado, eventos.fechaevento,
      eventos.costo, eventos.cantpersona,admins.nombre as nombre1, eventos.activo
      FROM eventos AS eventos
      INNER JOIN clientes AS clientes ON clientes.idcl = eventos.idev
      INNER JOIN tipoeventos AS tipoeventos ON tipoeventos.idte = eventos.idev
      INNER JOIN estados AS estados ON estados.ide = eventos.idev
      INNER JOIN admins AS admins ON admins.idad = eventos.idev");
        return view('reporte.eventos')->with('consulta', $consulta);

      }
  }

  public function modificaeventos($idev)
  {
  $consulta = eventos::where('idev','=',$idev)->get();
  $idevs = $consulta[0]->idte;
   $nombreev = tipoeventos::where('idte','=',$idevs)->get();
     $nomev = $nombreev[0]->evento;
    $tipoeventos = tipoeventos::where('evento','!=', $consulta[0]->idev)->get();

    //clientes

  $consulta = eventos::where('idev','=',$idev)->get();
  $idc = $consulta[0]->idcl;
   $nombrecli = clientes::where('idcl','=',$idc)->get();
     $nomc = $nombrecli[0]->nombre;
    $clientes = clientes::where('nombre','!=', $consulta[0]->idcl)->get();

//estados
$consulta = eventos::where('idev','=',$idev)->get();
$ides = $consulta[0]->ide;
$nombres = estados::where('ide','=',$ides)->get();
$est = $nombres[0]->estado;
$estados = estados::where('estado','!=', $consulta[0]->ide)->get();
//admins
$consulta = eventos::where('idev','=',$idev)->get();
$iad = $consulta[0]->idad;
$nombread = admins::where('idad','=',$iad)->get();
$ad = $nombread[0]->nombre;
$admins = admins::where('nombre','!=', $consulta[0]->idad)->get();


  return view('edita.eventos')
  ->with('consulta',$consulta[0])
  ->with('tipoeventos',$tipoeventos)
  ->with('idevs',$idevs)
  ->with('nomev',$nomev)
  ->with('estados',$estados)
  ->with('ides',$ides)
  ->with('est',$est)
  ->with('clientes',$clientes)
  ->with('idc',$idc)
  ->with('nomc',$nomc)
  ->with('est',$est)
  ->with('admins',$admins)
  ->with('iad',$iad)
  ->with('ad',$ad);
  }


  public function editaeventos(Request $request)
  {
    $idad = $request->idad;
    $idcl = $request->idcl;
    $idte = $request->idte;
    $direccion= $request->direccion;
    $ide = $request->ide;
    $fechaevento = $request->fechaevento;
    $costo = $request->costo;
    $cantpersona = $request->cantpersona;
    $ide = $request->ide;


    $this->validate($request,[
      'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú, ]*$/'],
      'costo'=> 'required|integer',
      'cantpersona'=>'required|integer',


    ]);

    $ev = eventos::find($idad);
    $ev->idad = $request->idad;
    $ev->idcl = $request->idcl;
    $ev->idte = $request->idte;
    $ev->direccion = $request->direccion;
    $ev->ide = $request->ide;
    $ev->fechaevento = $request->fechaevento;
    $ev->costo = $request->costo;
    $ev->cantpersona = $request->cantpersona;
    $ev->idad = $request->idad;
    $ev->save();
    $proceso = "Modifica evento";
    $mensaje = "El evento ha sido modificado";
    return view ('mensaje')
      ->with('proceso',$proceso)
      ->with('mensaje',$mensaje);

  }


  public function eliminaev($idev)
{
  $empresa= \DB:: UPDATE("update eventos set activo = 'No'
  where idev= $idev");
  $proceso = "DESACTIVAR EVENTO";
    $mensaje = "El evento ha sido desactivado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
  public function restauraev($idev)
{
  $empresa= \DB:: UPDATE("update eventos set activo = 'Si'
  where idev= $idev");
  $proceso = "Activar EVENTO";
    $mensaje = "El evento ha sido activado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}

}
