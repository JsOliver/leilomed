<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'usercontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'usercontroller/index';
$route['loja/(.+)'] = 'usercontroller/loja/$1';
$route['produto/(.+)'] = 'usercontroller/produto/$1';
$route['entrar'] = 'usercontroller/logcad';
$route['minha-conta'] = 'usercontroller/profile';
$route['meus-lances'] = 'usercontroller/meus_lances';
$route['minha-loja'] = 'usercontroller/minha_loja';
$route['itens-salvos'] = 'usercontroller/itens_salvos';
$route['farmacias-salvas'] = 'usercontroller/farmacias_salvas';
$route['historico'] = 'usercontroller/historico';
$route['configuracoes'] = 'usercontroller/configuracao';
$route['carrinho'] = 'usercontroller/carrinho';
$route['busca'] = 'usercontroller/busca';
$route['busca/(.+)'] = 'usercontroller/busca/$1';
$route['imagem'] = 'ajaxcontroler/exibir';
$route['ajaxlance'] = 'ajaxcontroler/lance';
$route['ajaxcard'] = 'ajaxcontroler/card';
$route['ajaxalterdata'] = 'ajaxcontroler/cogs';
$route['ajaxalterdataus'] = 'ajaxcontroler/alts';
$route['ajaxmapsapi'] = 'ajaxcontroler/maps';
$route['ajaxnewfarma'] = 'ajaxcontroler/addfarma';
$route['ajaxalteritemread'] = 'ajaxcontroler/readitem';
