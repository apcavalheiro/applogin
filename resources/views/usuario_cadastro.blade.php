@extends('layouts.app')

@section('conteudo')

   <div class="row margin-top-20">

      <div class="col-md-4 offset-md-4  col-sm-8 offset-sm-2  col-xs-12">

      @include('inc.erros')

         <form method="POST" action="/cadastar_usuario">

         {{ csrf_field() }}

            <div class="form-group">
               <label for="inputUsuario">Usuário</label>
               <input type="text" class="form-control" id="text_usuario" name="text_usuario" placeholder="Usuário" required>
            </div>

            <div class="form-group">
               <label for="inputEmail">E-mail</label>
               <input type="email" class="form-control" id="text_email" name="text_email" placeholder="E-mail" required>
            </div>

            <div class="form-group">
               <label for="text_senha">Senha</label>
               <input type="password" class="form-control" id="text_senha" name="text_senha" placeholder="Senha" required>
            </div>

            <div class="form-group">
               <label for="text_confirma_senha">Confirmar senha</label>
               <input type="password" class="form-control" id="text_confirma_senha" name="text_confirma_senha" placeholder="Confirmar senha" required>
            </div>

            <div class="form-group text-center">
            <input type="checkbox" id="check_termos_condicoes" name="check_termos_condicoes" value="1">
            <label for="check_termos_condicoes"> Concordo com os termos e condições</label>
            </div>

            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" >Fazer cadastro</button>
            </div>
         </form>
         <div class="text-center">
            <a href="/">Voltar</a>
            </div>
        </div>
      
   </div>

@endsection