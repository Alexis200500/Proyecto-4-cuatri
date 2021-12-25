<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuarios;
use Session;

class acceso extends Controller
{
    public function login()
    {
      return view('login');
    }
    public function valida(Request $request)
  {
      $correo = $request->correo;
      $password = $request->password;

      $this->validate($request,[
          'correo'=>'required|email',
          'password'=>'required'
      ]);

      $consulta = usuarios :: where('correo','=',$correo)
          ->where('password','=',$password)
          ->where('activo','=', 'Si')
          ->get();

      if (count($consulta)==0)
      {
          Session::flash('error', 'El usuario no existe o la contraseña
                                  no es correcta');
          return redirect()->route('login');
      }
      else
      {
          Session::put('sesionname',$consulta[0]->nombre);
          Session::put('sesionidu',$consulta[0]->idu);
          Session::put('sesiontipo',$consulta[0]->tipo);
          Session::put('sesionarchivo',$consulta[0]->archivo);

          return redirect()->route('principal');
      }

  }

  public function cerrarsesion()
{
  Session::forget('sesionname');
  Session::forget('sesionidu');
  Session::forget('sesiontipo');
  Session::flush();
  Session::flash('error', 'Session cerrada correctamente');
  return redirect()->route('login');
}

public function principal(){
  return view('principal');
}
}
