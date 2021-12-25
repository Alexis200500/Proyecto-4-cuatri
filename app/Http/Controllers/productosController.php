<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productos;
use App\categorias;
use App\materiales;
use App\rentas;
use App\colores;
use Session;

class productosController extends Controller
{
  public function Altaproductos()
{
$consulta= productos::orderby('idpr','desc')
               ->take(1)
               ->get();
    $idsigue = $consulta[0]->idpr + 1;


        $ca = categorias::WHERE('idca','>=',1)
        ->orderby('categoria','ASC')->get();

        $ma = materiales::WHERE('idm','>=',1)
        ->orderby('material','ASC')->get();

        $co = colores::WHERE('idcolor','>=',1)
        ->orderby('color','ASC')->get();
        $r = rentas::WHERE('idr','>=',1)
        ->orderby('idcl','ASC')->get();

 return view ('altas.productos')
->with('ca',$ca)
->with('ma',$ma)
->with('r',$r)
->with('co',$co)
->with('idsigue',$idsigue);
}
public function Guardaproductos(Request $request)
{

$idpr = $request->idpr;
$producto = $request->producto;
$idca = $request->idca;
$idm = $request->idm;
$idr = $request->idr;
$idcolor = $request->idcolor;
$costo = $request->costo;
$archivo= $request->archivo;


$this->validate($request,[
'producto'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
'costo'=>'required|integer',
'archivo'=>'mimes:jpeg,png,gif',
]);
$file = $request->file('archivo');
      if($file!=""){
        $ldate = date('Ymd_His_');
        $img = $file->getClientOriginalName();
        $img2 = $ldate.$img;
        \Storage::disk('local')->put($img2, \File::get($file));
      }
      else{
        $img2 ="sinfoto.jpg";
      }
$produc = new productos;
$produc->idpr = $request->idpr;
$produc->producto = $request->producto;
$produc->idca = $request->idca;
$produc->idm = $request->idm;
$produc->idr = $request->idr;
$produc->activo ='Si';
$produc->idcolor = $request->idcolor;
$produc->costo = $request->costo;
$produc-> archivo=$img2;/*archivo*/
$produc->save();
$proceso = "Alta Producto";
$mensaje = "El producto $request->producto ha sido registrado con exito";
return view ('mensaje')
->with('proceso',$proceso)
->with('mensaje',$mensaje);

}

public function Reporteproductos()
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
  $consulta = \DB::select("SELECT productos.idpr, productos.producto, categorias.categoria as categoria,
     materiales.material as material, productos.idr, colores.color as color,
    productos.costo,productos.archivo, productos.activo FROM productos
    AS productos
    INNER JOIN categorias AS categorias ON categorias.idca = productos.idpr
    INNER JOIN materiales AS materiales ON materiales.idm = productos.idpr
    INNER JOIN colores AS colores ON colores.idcolor = productos.idpr ");
    return view('reporte.productos')->with('consulta', $consulta);
  }

}

public function principal()
{
  return view('principal');
}
public function modificaproductos($idpr)
{
  $consulta = productos::where('idpr','=',$idpr)->get();
  $idcs = $consulta[0]->idca;
  $nombrecat = categorias::where('idca','=',$idcs)->get();
  $nomc = $nombrecat[0]->categoria;
  $categorias = categorias::where('categoria','!=', $consulta[0]->idca)->get();

  //material
  $consulta = productos::where('idpr','=',$idpr)->get();
  $idms = $consulta[0]->idm;
  $nombremat = materiales::where('idm','=',$idms)->get();
  $nomm = $nombremat[0]->material;
  $materiales = materiales::where('material','!=', $consulta[0]->idm)->get();

  //rentas
  $consulta = productos::where('idpr','=',$idpr)->get();
  $idrs = $consulta[0]->idr;
  $nombrerent = rentas::where('idr','=',$idrs)->get();
  $nomr = $nombrerent[0]->idr;
  $rentas = rentas::where('idr','!=', $consulta[0]->idr)->get();


  //color
  $consulta = productos::where('idpr','=',$idpr)->get();
  $idcos = $consulta[0]->idcolor;
  $nombrecol = colores::where('idcolor','=',$idcos)->get();
  $nomcolor = $nombrecol[0]->color;
  $colores = colores::where('color','!=', $consulta[0]->idcolor)->get();

  return view('edita.productos')
  ->with('consulta',$consulta[0])
  ->with('categorias',$categorias)
  ->with('idcs',$idcs)
  ->with('nomc',$nomc)
  ->with('materiales',$materiales)
  ->with('idms',$idms)
  ->with('nomm',$nomm)
  ->with('rentas',$rentas)
  ->with('idrs',$idrs)
  ->with('nomr',$nomr)
  ->with('colores',$colores)
  ->with('idcos',$idcos)
  ->with('nomcolor',$nomcolor);
}


public function editarproducto(Request $request)
{
  $idpr = $request->idpr;
  $producto = $request->producto;
  $idca = $request->idca;
  $idm = $request->idm;
  $idr = $request->idr;
  $idcolor = $request->idcolor;
  $costo = $request->costo;

  $this->validate($request,[

    'producto'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'costo'=>'required|integer',
    'archivo'=>'mimes:jpeg,png,gif',
  ]);
  //return $request->idpr;
  $file = $request->file('archivo');
          if($file!=""){
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
          }

          $produc =productos::find($idpr);
          if($file!="")
          {
            $produc->archivo =$img2;
          }
  $produc->idpr = $request->idpr;
  $produc->producto = $request->producto;
  $produc->idca = $request->idca;
  $produc->idm = $request->idm;
  $produc->idr = $request->idr;
  $produc->idcolor = $request->idcolor;
  $produc->costo = $request->costo;

  $produc->save();
  $proceso = "Modifica Producto";
  $mensaje = "El producto $request->producto ha sido modificado";
  return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);
}


public function eliminapr($idpr)
{
$empresa= \DB:: UPDATE("update productos set activo = 'No'
where idpr= $idpr");
$proceso = "DESACTIVAR PRODUCTO";
  $mensaje = "El producto  ha sido desactivado";
  return view ('mensaje')
->with('proceso',$proceso)
->with('mensaje',$mensaje);
}
public function restaurapr($idpr)
{
$empresa= \DB:: UPDATE("update productos set activo = 'Si'
where idpr= $idpr");
$proceso = "Activar PRODUCTO";
  $mensaje = "El producto  ha sido activado";
  return view ('mensaje')
->with('proceso',$proceso)
->with('mensaje',$mensaje);
}
}
