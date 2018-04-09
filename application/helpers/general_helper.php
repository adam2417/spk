<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('objectToArray'))
{
	function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
		if (is_array($d)) {
			/*
			 * Return array converted to object
			 * Using __FUNCTION__ (Magic constant)
			 * for recursive call
			 */
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
}
if ( ! function_exists('arrayToObject'))
{
	function arrayToObject($d) {
		if (is_array($d)) {
			/*
			 * Return array converted to object
			 * Using __FUNCTION__ (Magic constant)
			 * for recursive call
			 */
			return (object) array_map(__FUNCTION__, $d);
		}
		else {
			// Return object
			return $d;
		}
	}
}
if(!function_exists('get_sysparam'))
{
	function get_sysparam($param_id){
		$CI =& get_instance();
		$CI->load->model('sysparam_model');
		$CI->sysparam_model->setId($param_id);
		$param_val = $CI->sysparam_model->getParamById();
		return $param_val[0]->param_val;
	}
}