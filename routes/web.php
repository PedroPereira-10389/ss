<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::auth();

Route::group(['middleware' => 'web'], function () {

    
Route::post('/homepage', function () {
    return view('homepage');
});


    
Route::get('/', function () {
    return view('index');
});


Route::post('/inicio', function () {
    return view('homepage');
})->name('inicio');


Route::get('/registar', function () {
    return view('registar');
});

Route::get('/perfil', 'IndexController@perfil')->name('perfiluser');




Route::post('/dados', 'IndexController@login')->name('passadados');

Route::post('/dadosregister', 'IndexController@store')->name('passadosregister');

Route::get('/logout', 'IndexController@logout')->name('logout');

Route::get('/dadosemail', 'IndexController@showemail')->name('passaemail');


Route::get('/home', function () {
    return view('homepage');
})->name('home');




Route::get('/forgot', function () {
    return view('forgotpassword');
})->name('forgotpassword');


Route::post('/resetemail', 'IndexController@resetpassword')->name('resetemail');

Route::post('/resetemailtwo', 'IndexController@resetpasswordsteep')->name('resetemailtwo');

Route::get('/editarutilizadorform', 'IndexController@editarutilizadorform')->name('editarutilizadorform');

Route::post('/alteraperfildados', 'IndexController@alteraperfildados')->name('alteraperfildados');

Route::post('/dadosprofiles', 'IndexController@alteraprofile')->name('dadosprofileaa');

Route::post('/passwordprofiles', 'IndexController@alteraprofilepassword')->name('passwordprofiles');

Route::post('/adicionahabilitacao', 'IndexController@adicionahabilitacao')->name('adicionahabilitacao');

Route::post('/adicionacompetencia', 'IndexController@adicionacompetencia')->name('adicionacompetencia');

Route::get('/listarcompetenciasuser', 'IndexController@listarcompetenciasuser')->name('listarcompetenciasuser');

Route::get('/listarclientes', 'IndexController@listarclientes')->name('listarclientes');

Route::get('/listarclientesid/{idcliente}', 'IndexController@listarclientesid')->name('listarclientesid');

Route::post('/editarcliente', 'IndexController@editarcliente')->name('editarcliente');

Route::get('/eliminarclienteid', 'IndexController@eliminarclienteid')->name('eliminarclienteid');


Route::get('/detalhesclienteid/{idcliente}', 'IndexController@detalhesclienteid')->name('detalhesclienteid');

Route::get('/detalhesreuniaoid/{idreuniao}/{idcliente}', 'IndexController@detalhesreuniaoid')->name('detalhesreuniaoid');


Route::post('/adicionarclienteform', 'IndexController@storecliente')->name('adicionarclienteform');


Route::get('/adicionarcliente', 'IndexController@adicionarcliente')->name('adicionarcliente');

Route::get('/listarreunioes', 'IndexController@listarreunioes')->name('listarreunioes');

Route::get('/editarreuniao/{idreuniao}', 'IndexController@editarreuniao')->name('editarreuniao');

Route::post('/editarreuniaoid', 'IndexController@editarreuniaoid')->name('editarreuniaoid');

Route::get('/eliminarreuniaoid', 'IndexController@eliminarreuniaoid')->name('eliminarreuniaoid');
 
Route::get('/adicionarreuniao', 'IndexController@adicionarreuniao')->name('adicionarreuniao');

Route::post('/storereuniao', 'IndexController@storereuniao')->name('storereuniao');

Route::post('/adicionardescricaoreuniao/{idreuniao}', 'IndexController@adicionardescricaoreuniao')->name('adicionardescricaoreuniao');

Route::post('/adicionaroutrocontatos/{idcliente}', 'IndexController@adicionaroutrocontatos')->name('adicionaroutrocontatos');

Route::get('/listarfuncionarios', 'IndexController@listarfuncionarios')->name('listarfuncionarios');

Route::get('/detalhesfuncionarioid/{idfuncionario}', 'IndexController@detalhesfuncionarioid')->name('detalhesfuncionarioid');

Route::get('/listarfuncionarioid/{idfuncionario}', 'IndexController@listarfuncionarioid')->name('listarfuncionarioid');

Route::post('/editarfuncionario', 'IndexController@editarfuncionario')->name('editarfuncionario');

Route::get('/eliminarfuncionarioid', 'IndexController@eliminarfuncionarioid')->name('eliminarfuncionarioid');

Route::get('/adicionarfuncionario', 'IndexController@adicionarfuncionario')->name('adicionarfuncionario');

Route::post('/storefuncionario', 'IndexController@storefuncionario')->name('storefuncionario');

Route::get('/listarprecosid/{idfuncionario}', 'IndexController@listarprecosid')->name('listarprecosid');

Route::post('/editarvaloresfuncionario', 'IndexController@editarvaloresfuncionario')->name('editarvaloresfuncionario');

Route::get('/listarencomendas', 'IndexController@listarencomendas')->name('listarencomendas');

Route::get('/listarencomendasid/{idencomenda}', 'IndexController@listarencomendasid')->name('listarencomendasid');

Route::get('/listarencomendaseditarid/{idencomenda}', 'IndexController@listarencomendaseditarid')->name('listarencomendaseditarid');

Route::post('/editarencomenda', 'IndexController@editarencomendas')->name('editarencomenda');

Route::get('/eliminarencomendaid', 'IndexController@eliminarencomendaid')->name('eliminarencomendaid');

Route::get('/listarartigos', 'IndexController@listarartigos')->name('listarartigos');

Route::get('/listarprodutosid/{idproduto}', 'IndexController@listarprodutosid')->name('listarprodutosid');

Route::get('/adicionarproduto', 'IndexController@adicionarproduto')->name('adicionarproduto');

Route::post('/storeproduto', 'IndexController@storeproduto')->name('storeproduto');

Route::post('/editarvaloresprodutos', 'IndexController@editarvaloresprodutos')->name('editarvaloresprodutos');

Route::get('/verprodutosid/{idproduto}', 'IndexController@verprodutosid')->name('verprodutosid');

Route::post('/editarproduto', 'IndexController@editarproduto')->name('editarproduto');

Route::get('/eliminarprodutoid', 'IndexController@eliminarprodutoid')->name('eliminarprodutoid');

Route::get('/listarrankfuncionarios', 'IndexController@listarrankfuncionarios')->name('listarrankfuncionarios');

Route::get('/listardespesas', 'IndexController@listardespesas')->name('listardespesas');

Route::get('/listardespesasdetaalhe/{iddespesa}', 'IndexController@listardespesasdetaalhe')->name('listardespesasdetaalhe');

Route::get('/adicionardespesa', 'IndexController@adicionardespesa')->name('adicionardespesa');

Route::post('/adicionardespesaform', 'IndexController@adicionardespesaform')->name('adicionardespesaform');

Route::get('/listardespesaid/{idcliente}', 'IndexController@listardespesaid')->name('listardespesaid');

Route::post('/editardespesaform', 'IndexController@editardespesaform')->name('editardespesaform');

Route::get('/eliminardespesaid', 'IndexController@eliminardespesaid')->name('eliminardespesaid');

Route::get('/dashboard1', 'IndexController@dashboard1')->name('dashboard1');

Route::get('/dashboard1mensal', 'IndexController@dashboard1mensal')->name('dashboard1mensal');

});


