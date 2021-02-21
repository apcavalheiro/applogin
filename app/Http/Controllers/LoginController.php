<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Usuario;
use Session;

class LoginController extends Controller
{
    public function exibirPaginaLogin(){
        return view('usuario_login');
    }

    public function validarSessao(){ 

        if(!Session::has('usuario')){
            return $this->exibirPaginaLogin();
        }
        return view('usuario_logado');
    }

    public function validarLogin(Request $req){
        $this->validate($req, [
            'text_usuario' => 'required',
            'text_senha' => 'required',
          ]);

          $usuario = Usuario::where('usuario',$req->text_usuario)->first();

          if(!isset($usuario)){
              $erros_bd = ['Usuário não encontrado na base de dados!'];
              return view('usuario_login', compact('erros_bd'));
          }

          if(!Hash::check($req->text_senha, $usuario->senha)){
            $erros_bd = ['Senha incorreta!'];
            return view('usuario_login', compact('erros_bd'));
          }
          Session::put('usuario',$usuario->usuario);
          return redirect('/');
    }

    public function realizarLogout(){

        Session::flush();
        return redirect('/');
    }
}
