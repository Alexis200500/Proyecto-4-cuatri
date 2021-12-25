<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admins;
use App\estados;
use App\puestos;
use Session;
class adminController extends Controller
{
    public function Altaadmins()
    {
      $consulta= admins::orderby('idad','desc')
      ->take(1)
      ->get();
       $idsigue = $consulta[0]->idad + 1;

      $estados = estados::WHERE('ide','>=',1)
      ->orderby('estado','ASC')
      ->get();

      $puestos = puestos::WHERE('idpue','>=',1)
      ->orderby('puesto','ASC')
      ->get();

                  return view('altas.admins')
                  ->with('idsigue',$idsigue)->with('estados',$estados)->with('puestos',$puestos);
    }
    public function Guardaadmins(Request $request)
{

  $idad = $request->idad;
  $nombre = $request->nombre;
  $apellido1 = $request->apellido1;
  $apellido2 = $request->apellido2;
  $edad = $request->edad;
  $sexo = $request->sexo;
  $telefono = $request->telefono;
  $direccion= $request->direccion;
  $ide = $request->ide;
  $idpue = $request->idpue;
  $email = $request->email;
  $contraseña = $request->contraseña;
  $archivo = $request->archivo;

  $this->validate($request,[

    'nombre'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'apellido1'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'apellido2'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,ñ, ]*$/'],
    'edad'=> ['regex:/^[0-9]{2}$/'],
    'sexo'=> ['regex:/^[F-M]{1}$/'],
    'telefono'=> ['regex:/^[0-9]{10}$/'],
    'direccion'=>['regex:/^[A-Z][A-Z,a-z,á,é,í,ó,ú,0-9,., ]*$/'],
    'archivo'=>'mimes:jpeg,png,gif',
    'email'=>'required|email'  ]);

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



  $admi = new admins;
  $admi->idad = $request->idad;
  $admi->nombre = $request->nombre;
  $admi->apellido1 = $request->apellido1;
  $admi->apellido2 = $request->apellido2;
  $admi->edad = $request->edad;
  $admi->sexo = $request->sexo;
  $admi->telefono = $request->telefono;
  $admi->direccion = $request->direccion;
  $admi->ide = $request->ide;
  $admi->archivo =$img2;/*archivo*/
  $admi->activo ='Si';
  $admi->idpue = $request->idpue;
  $admi->email = $request->email;
  $admi->contraseña = $request->contraseña;
  $admi->save();
  $proceso = "Alta Administrador";
  $mensaje = "El Administrador $request->nombre ha sido registrado con exito";
  return view ('mensaje')
    ->with('proceso',$proceso)
    ->with('mensaje',$mensaje);

}

   public function Reporteadmins()
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
     $consulta = \DB::select("SELECT admins.idad, admins.nombre, admins.apellido1,
        admins.apellido2, admins.edad, admins.sexo,admins.archivo, admins.activo,
       admins.telefono,admins.direccion,estados.estado as estado,
       puestos.puesto as puesto,admins.email, admins.contraseña FROM admins AS admins
       INNER JOIN estados AS estados ON estados.ide = admins.idad
       INNER JOIN puestos AS puestos ON puestos.idpue = admins.idad ");
      //  $consulta = \DB::select("Select * from admins");
      //  return $consulta;
         return view('reporte.admins')->with('consulta', $consulta);
       }
   }
   public function modificaad($idad)
	{
		$consulta = admins::where('idad','=',$idad)->get();
		$ides = $consulta[0]->ide;

		$nombres = estados::where('ide','=',$ides)->get();
		$est = $nombres[0]->estado;
		$estados = estados::where('estado','!=', $consulta[0]->ide)->get();

    $idp = $consulta[0]->idpue;
    $nombrepues = puestos::where('idpue','=',$idp)->get();
    $puest = $nombrepues[0]->puesto;
    $puestos = puestos::where('puesto','!=', $consulta[0]->idpue)->get();

		return view('edita.admins')
		->with('consulta',$consulta[0])
		->with('estados',$estados)
		->with('ides',$ides)
		->with('est',$est)
    ->with('puestos',$puestos)
    ->with('idp',$idp)
    ->with('puest',$puest);
	}

    public function editaad(Request $request)
    {
      //return $request;
      $idad = $request->idad;
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

          $admi =admins::find($idad);
          if($file!="")
          {
            $admi->archivo =$img2;
          }

    $admi->idad = $request->idad;
    $admi->nombre = $request->nombre;
    $admi->apellido1 = $request->apellido1;
    $admi->apellido2 = $request->apellido2;
    $admi->edad = $request->edad;
    $admi->sexo = $request->sexo;
    $admi->telefono = $request->telefono;
    $admi->direccion = $request->direccion;
    $admi->ide = $request->ide;
    $admi->idpue = $request->idpue;
    $admi->email = $request->email;
    $admi->contraseña = $request->contraseña;
    $admi->save();
    $proceso = "Modificacion Administrador";
    $mensaje = "El Administrador $request->nombre ha sido Modificado";
    return view ('mensaje')
      ->with('proceso',$proceso)
      ->with('mensaje',$mensaje);

    }

    public function eliminaad($idad)
	{
		$empresa= \DB:: UPDATE("update admins set activo = 'No'
		where idad= $idad");
		$proceso = "DESACTIVAR ADMINISTRADOR";
	    $mensaje = "El Administrador ha sido desactivado";
	    return view ('mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}
  public function restauraad($idad)
	{
		$empresa= \DB:: UPDATE("update admins set activo = 'Si'
		where idad= $idad");
		$proceso = "ACTIVAR ADMINISTRADOR";
	    $mensaje = "El Administrador ha sido activado";
	    return view ('mensaje')
		->with('proceso',$proceso)
		->with('mensaje',$mensaje);
	}

  public function localizacion()
  {
    return view('localizacion');
  }
}
