<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorias;
use Session;
class categoriasController extends Controller
{
  public function Altacategoria()
{

$consulta= categorias::orderby('idca','desc')
                 ->take(1)
                 ->get();
      $idsigue = $consulta[0]->idca + 1;


  return view ('altas.categoria')
       ->with('idsigue',$idsigue);
}
  public function Guardacategoria(Request $request)
{

$idca = $request->idca;
$categoria = $request->categoria;

$this->validate($request,[
  'categoria'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
]);

$categoria = new categorias;
$categoria->idca = $request->idca;
$categoria->categoria = $request->categoria;
$categoria->activo ='Si';
$categoria->save();
$proceso = "Alta categoria";
$mensaje = "El categoria $request->categoria ha sido registrado con exito";
return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
public function Reportecategoria()
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
    $consulta = \DB::select("SELECT categorias.idca, categorias.categoria, categorias.activo FROM categorias ");
        return view('reporte.categorias')->with('consulta', $consulta);
      }

  }
  public function a(){
    return view('principal');
  }

  public function modificacategorias($idca)
    {
      $consulta = categorias::where('idca','=',$idca)->get();
      $idcat = $consulta[0]->idca;
      return view('edita.categorias')
      ->with('consulta' ,$consulta[0])
      ->with('idcat',$idcat);
    }

    public function editarcategorias(Request $request)
    {
      $idca = $request->idca;
      $categoria = $request->categoria;

      $this->validate($request,[
        'categoria'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
      ]);

            $categoria = categorias::find($idca);
      $categoria->idca = $request->idca;
      $categoria->categoria = $request->categoria;
      $categoria->save();
      $proceso = "Modifica categoria";
      $mensaje = "El categoria $request->categoria ha sido modificada";
      return view ('mensaje')
        ->with('proceso',$proceso)
        ->with('mensaje',$mensaje);
    }

    public function eliminaca($idca)
  {
    $empresa= \DB:: UPDATE("update categorias set activo = 'No'
    where idca= $idca");
    $proceso = "DESACTIVAR CATEGORIA";
      $mensaje = "La categoria ha sido desactivada";
      return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
  }
    public function restauraca($idca)
  {
    $empresa= \DB:: UPDATE("update categorias set activo = 'Si'
    where idca= $idca");
    $proceso = "DESACTIVAR CATEGORIA";
      $mensaje = "La categoria ha sido activada";
      return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
  }
}
