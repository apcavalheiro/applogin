<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\utils\PasswordGenerator;
use App\Mail\EmailRecuperarSenha;
use App\Usuario;

class UsuarioController extends Controller
{
    public function exibirPaginaDeCadastro(){
        return view('usuario_cadastro');
    }

    public function cadastrarUsuario(Request $req){
        $this->validate($req, [
            'text_usuario' => 'required|between:3,30|alpha_num',
            'text_email' => 'required|email',
            'text_senha' => 'required|between:6,15',
            'text_confirma_senha' => 'required|same:text_confirma_senha',
            'check_termos_condicoes' => 'accepted'
        ]);

        $usuarios = Usuario::where('usuario','=', $req->text_usuario)
                            ->orWhere('email', '=', $req->text_email)
                            ->get();
            if($usuarios->count()!=0){
                $erros_bd = ['Usuário ou email já existe na base de dados!'];
                return view('usuario_cadastro',compact('erros_bd'));
            }
        $usuario = new Usuario();
        $usuario->usuario = $req->text_usuario;
        $usuario->email = $req->text_email;
        $usuario->senha = Hash::make($req->text_senha);
        $usuario->save();

        return redirect('/');

    }

    public function exibirPaginaRecuperarSenha(){
        return view('recuperar_senha');
    }

    public function criarNovaSenha(Request $req){
        $this->validate($req, [
            'text_email' => 'required|email',
        ]);
        $usuario = Usuario::where('email', $req->text_email)->get();
        if($usuario->count()==0){
            $erros_bd = ['E-mail não existe na base de dados!'];
            return view('recuperar_senha', compact('erros_bd'));
        }
        $usuario = $usuario->first();
        $novaSenha = PasswordGenerator::gerarSenha(15,true,true,true,true);

        Mail::to($usuario->email)->send(new EmailRecuperarSenha($novaSenha));

        if (count(Mail::failures())>0) {
            $erros_bd = ['Falha ao enviar E-mail! <br> Tente novamente mais tarde.'];
            return view('recuperar_senha', compact('erros_bd'));
        }else{
            $usuario->senha = Hash::make($novaSenha);
            $usuario->save();
            return \redirect('/email_enviado');
        }
        
    }

    public function emailEnviado(){
        return view('mails.email_enviado');
    }
}
