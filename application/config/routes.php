<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'usercontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'usercontroller/index';
$route['loja/(.+)'] = 'usercontroller/produto/$1';
$route['entrar'] = 'usercontroller/logcad';
$route['minha-conta'] = 'usercontroller/profile';
$route['meus-lances'] = 'usercontroller/meus_lances';
$route['itens-salvos'] = 'usercontroller/itens_salvos';
$route['farmacias-salvas'] = 'usercontroller/farmacias_salvas';
$route['historico'] = 'usercontroller/historico';
$route['configuracoes'] = 'usercontroller/configuracao';
$route['carrinho'] = 'usercontroller/carrinho';
$route['busca'] = 'usercontroller/busca';
$route['imagem'] = 'ajaxcontroler/exibir';
