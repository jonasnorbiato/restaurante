<?php

Route::get('/', 'MesaController@exibir');

Route::get('/realizar/pedido/{NR_MESA}', 'ContaController@status');

Route::post('/inserir/conta', 'ContaController@inserir');

Route::match(array('GET','POST'),'/fechar/conta/{NR_CONTA}', 'ContaController@fechar');

Route::match(array('GET','POST'),'/cadastrar/pedido/{NR_CONTA}', 'PedidoController@cadastrar');

Route::post('/inserir/pedido/{NR_CONTA}', 'PedidoController@inserir');
Route::get('/excluir/pedido/{NR_PEDIDO}', 'PedidoController@excluir');

Route::get('/fechar/conta/salvar/{NR_CONTA}', 'ContaController@fecharSalvar');

Route::get('/visualizar/vendas', 'ContaController@visualizar');

Route::get('/cancelar/venda/{NR_CONTA}', 'ContaController@excluir');

Route::get('/cadastrar/garcom', 'GarconController@cadastrar');

Route::post('/salvar/garcom', 'GarconController@salvar');

Route::get('/visualizar/garcom', 'GarconController@visualizar');

Route::get('/editar/garcon/{nr_garcon}', 'GarconController@editar');

Route::get('/excluir/garcon/{nr_garcon}', 'GarconController@excluir');
Route::post('/inserir/garcon/{nr_garcon}', 'GarconController@inserir');

