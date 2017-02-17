<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'usercontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home'] = 'usercontroller/index';
$route['produto/(.+)'] = 'usercontroller/produto/$1';
$route['entrar'] = 'usercontroller/logcad';
