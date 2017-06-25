<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
** param => string or array to display
** return => array
** return element from $tab var
** author => Quentin
*/

function debug($tab = array())
{
	echo '<pre>';
	print_r($tab);
	echo '</pre>';
}