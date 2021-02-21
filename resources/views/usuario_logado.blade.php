@extends('layouts.app')

@section('conteudo')

    <p> <strong>{{session('usuario')}}</strong> você está logado, seja bem vindo! </p>
    <p><a href="/usuario_logout">Logout/Sair</a></p>

@endsection