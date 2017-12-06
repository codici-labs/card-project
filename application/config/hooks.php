<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

// post_controller_constructor
// pre_controller
// post_controller

$hook['pre_controller'] = array(
    'class'    => 'Hooks',
    'function' => 'preController',
    'filename' => 'Hooks.php',
    'filepath' => 'hooks',
    'params'   => array()
);

$hook['post_controller_constructor'] = array(
    'class'    => 'Hooks',
    'function' => 'postControllerConstructor',
    'filename' => 'Hooks.php',
    'filepath' => 'hooks',
    'params'   => array()
);