<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\clientes;
use App\estados;
use Session;
class clienteController extends Controller
{

  public function Altaclientes()
  {
      $consulta= clientes::orderby('idcl','desc')
        ->take(1)
        ->get();
        $idsigue = $consulta[0]->idcl + 1;

      $estados = estados::WHERE('ide','>=',1)
        ->orderby('estado','ASC')->get();

      return view('altas.cliente')
      ->with('idsigue',$idsigue)
      ->with('estados',$estados);
  }

  public function Guardaclientes(Request $request)
{
//  return $request;
  $idcl = $request->idcl;
  $nombre = $request->nombre;
  $apellido1 = $request->apellido1;
  $apellido2 = $request->apellido2;
  $edad = $request->edad;
  $sexo = $request->sexo;
  $telefono = $request->telefono;
  $direccion= $request->direccion;
  $ide = $request->ide;
  $email = $request->email;
  $contraseña = $request->contraseña;

  $this->validate($request,[

    'nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'apellido1'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'apellido2'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'edad'=> ['regex:/^[0-9]{2}$/'],
    'sexo'=> ['regex:/^[F-M]{1}$/'],
    'telefono'=> ['regex:/^[0-9]{10}$/'],
    'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,0-9,., ]*$/'],
     'archivo'=>'mimes:jpeg,png,gif',
    'email'=>'required|email',
  ]);
  $file = $request->file('archivo');
 	 if($file!="")
 	 {
 	 $ldate = date('Ymd_His_');
 	 $img = $file->getClientOriginalName();
 	$img2 = $ldate.$img;
 	 \Storage::disk('local')->put($img2, \File::get($file));
 	 }
 	 else
 	 {
      $img2 ="sinfoto.jpg";
 	 }


  $clien = new clientes;
  $clien->idcl = $request->idcl;
  $clien->nombre = $request->nombre;
  $clien->apellido1 = $request->apellido1;
  $clien->apellido2 = $request->apellido2;
  $clien->edad = $request->edad;
  $clien->sexo = $request->sexo;
  $clien->telefono = $request->telefono;
  $clien->archivo =$img2;/*archivo*/
  $clien->activo ='Si';
  $clien->direccion = $request->direccion;
  $clien->ide = $request->ide;
  $clien->email = $request->email;
  $clien->contraseña = $request->contraseña;
  $clien->save();
  $proceso = "Alta cliente";
  $mensaje = "El cliente $request->nombre ha sido registrado con exito";
  return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);

}
  public function Reporteclientes()
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
    $consulta = \DB::select("SELECT clientes.idcl, clientes.nombre, clientes.apellido1,
           clientes.apellido2, clientes.edad, clientes.sexo,
          clientes.telefono,clientes.direccion,estados.estado as estado, clientes.archivo, clientes.activo,
          clientes.email, clientes.contraseña, clientes.activo FROM clientes
          AS clientes INNER JOIN estados AS estados ON estados.ide = clientes.idcl");
            return view('reporte.clientes')->with('consulta', $consulta);
          }
  }
  public function modificacl($idcl)
  {
    $consulta = clientes::where('idcl','=',$idcl)->get();
$idc = $consulta[0]->ide;

$nombres = estados::where('ide','=',$idc)->get();
$est = $nombres[0]->estado;
$estados = estados::where('estado','!=', $consulta[0]->ide)->get();

return view('edita.cliente')
->with('consulta',$consulta[0])
->with('estados',$estados)
->with('idc',$idc)
->with('est',$est);
  }

  public function editacl(Request $request)
  {
    $idcl = $request->idcl;
    $nombre = $request->nombre;
    $apellido1 = $request->apellido1;
    $apellido2 = $request->apellido2;
    $edad = $request->edad;
    $sexo = $request->sexo;
    $telefono = $request->telefono;
    $direccion= $request->direccion;
    $ide = $request->ide;

    $email = $request->email;
    $contraseña = $request->contraseña;

    $this->validate($request,[

      'nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
      'apellido1'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
      'apellido2'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
      'edad'=> ['regex:/^[0-9]{2}$/'],
      'sexo'=> ['regex:/^[F-M]{1}$/'],
      'telefono'=> ['regex:/^[0-9]{10}$/'],
      'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,0-9,., ]*$/'],
      'email'=>'required|email',

    ]);

  $file = $request->file('archivo');
          if($file!=""){
            $ldate = date('Ymd_His_');
            $img = $file->getClientOriginalName();
            $img2 = $ldate.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
          }

          $clien = clientes::find($idcl);
          if($file!="")
          {
              $clien->archivo =$img2;
          }
    $clien->idcl = $request->idcl;
    $clien->nombre = $request->nombre;
    $clien->apellido1 = $request->apellido1;
    $clien->apellido2 = $request->apellido2;
    $clien->edad = $request->edad;
    $clien->sexo = $request->sexo;
    $clien->telefono = $request->telefono;
    $clien->direccion = $request->direccion;
    $clien->ide = $request->ide;
    $clien->email = $request->email;
    $clien->contraseña = $request->contraseña;
    $clien->save();
    $proceso = "Modificacion Cliente";
    $mensaje = "El Cliente $request->nombre ha sido Modificado";
    return view ('mensaje')
      ->with('proceso',$proceso)
      ->with('mensaje',$mensaje);
  }

  public function eliminacl($idcl)
{
  $empresa= \DB:: UPDATE("update clientes set activo = 'No'
  where idcl= $idcl");
  $proceso = "DESACTIVAR CLIENTE";
    $mensaje = "El cliente ha sido desactivado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
  public function restauracl($idcl)
{
  $empresa= \DB:: UPDATE("update clientes set activo = 'Si'
  where idcl= $idcl");
  $proceso = "ACTIVAR CLIENTE";
    $mensaje = "El cliente  ha sido activado";
    return view ('mensaje')
  ->with('proceso',$proceso)
  ->with('mensaje',$mensaje);
}
}
