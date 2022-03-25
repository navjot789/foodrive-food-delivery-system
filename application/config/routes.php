<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['login'] = 'auth/index';
$route['logout'] = 'auth/logout';
$route['translate_uri_dashes'] = FALSE;
