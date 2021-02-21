<?php


Route::get('/', 'LoginController@validarSessao');
Route::post('/validar_usuario', 'LoginController@validarLogin');
Route::get('/usuario_logout', 'LoginController@realizarLogout');


Route::get('/recuperar_senha', 'UsuarioController@exibirPaginaRecuperarSenha');
Route::post('/solicitar_senha', 'UsuarioController@criarNovaSenha');
Route::get('/cadastro_usuario', 'UsuarioController@exibirPaginaDeCadastro');
Route::post('/cadastar_usuario', 'UsuarioController@cadastrarUsuario');
Route::get('/email_enviado', 'UsuarioController@emailEnviado');
