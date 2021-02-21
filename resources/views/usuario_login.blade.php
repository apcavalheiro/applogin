@extends('layouts.app')

@section('conteudo')

   <div class="row margin-top-20">
      <div class="col-md-4 offset-md-4  col-sm-8 offset-sm-2  col-xs-12">
      @include('inc.erros')
         <form method="POST" action="/validar_usuario">
            {{ csrf_field() }}
            <div class="form-group">
               <label for="text_usuario">Usuário</label>
               <input type="text_usuario" class="form-control" id="text_usuario" name="text_usuario" placeholder="Usuário..." required>
            </div>
            <div class="form-group">
               <label for="text_senha">Senha</label>
               <input type="password" class="form-control" id="text_senha" name="text_senha" placeholder="Senha..." required>
            </div>

            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" >Fazer Login</button>
            </div>
         </form>
            <div class="text-center margin-top-20">
               <p> <a href="/recuperar_senha"> Esqueceu a senha?</a></p>
            </div>
            <div class="text-center">
               <p> <a href="/cadastro_usuario"> Ainda não tem conta?</a></p>
            </div>
        </div>
      
   </div>

@endsection