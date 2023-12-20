<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'defaultpage';
$route['login'] = 'logincontroller';

$route['adminpage'] = 'adminpagecontroller/AdminPageHome';

$route['userpage'] = 'userpagecontroller/UserPageHome';
$route['liste-demande'] = 'adminpagecontroller/listRequestAdmin';






$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
