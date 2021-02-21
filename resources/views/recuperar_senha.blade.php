@extends('layouts.app')

@section('conteudo')

   <div class="row margin-top-20">
      <div class="col-md-4 offset-md-4  col-sm-8 offset-sm-2  col-xs-12">
      @include('inc.erros')
         <form method="POST" action="/solicitar_senha">
         {{ csrf_field() }}
            <div class="form-group">
               <label for="text_email">E-mail</label>
               <input type="email" class="form-control" id="text_email" name="text_email" placeholder="E-mail" required>
            </div>
           
            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary" >Recuperar senha</button>
            </div>
         </form>
            <div class="text-center margin-top-20">
               <p> <a href="/">Voltar</a></p>
            </div>
           
        </div>
      
   </div>

@endsection