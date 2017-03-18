<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Usercontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'Usercontroller/index';
$route['loja/(.+)'] = 'Usercontroller/loja/$1';
$route['produto/(.+)'] = 'Usercontroller/produto/$1';
$route['entrar'] = 'Usercontroller/logcad';
$route['minha-conta'] = 'Usercontroller/profile';
$route['meus-lances'] = 'Usercontroller/meus_lances';
$route['minha-loja'] = 'Usercontroller/minha_loja';
$route['itens-salvos'] = 'Usercontroller/itens_salvos';
$route['farmacias-salvas'] = 'Usercontroller/farmacias_salvas';
$route['historico'] = 'Usercontroller/historico';
$route['configuracoes'] = 'Usercontroller/configuracao';
$route['carrinho'] = 'Usercontroller/carrinho';
$route['busca'] = 'Usercontroller/busca';
$route['busca/(.+)'] = 'Usercontroller/busca/$1';
$route['imagem'] = 'Ajaxcontroler/exibir';
$route['ajaxlance'] = 'Ajaxcontroler/lance';
$route['ajaxcard'] = 'Ajaxcontroler/card';
$route['ajaxalterdata'] = 'Ajaxcontroler/cogs';
$route['ajaxalterdataus'] = 'Ajaxcontroler/alts';
$route['ajaxmapsapi'] = 'Ajaxcontroler/maps';
$route['ajaxnewfarma'] = 'Ajaxcontroler/addfarma';
$route['ajaxalteritemread'] = 'Ajaxcontroler/readitem';
$route['ajaxrespostaitem'] = 'Ajaxcontroler/respostaitem';
$route['ajaxalteritem'] = 'Ajaxcontroler/alteritem';
$route['ajaxupdadopd'] = 'Ajaxcontroler/alteritem';
$route['ajaxremoveItem'] = 'Ajaxcontroler/removeitem';
$route['actionpedido'] = 'Ajaxcontroler/actionpedido';
$route['removelistaped'] = 'Ajaxcontroler/removelistaped';
$route['ajaxdeletestore'] = 'Ajaxcontroler/ajaxdeletestore';
