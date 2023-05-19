<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('luxmed_storage_get')) {
	function luxmed_storage_get($var_name, $default='') {
		global $LUXMED_STORAGE;
		return isset($LUXMED_STORAGE[$var_name]) ? $LUXMED_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('luxmed_storage_set')) {
	function luxmed_storage_set($var_name, $value) {
		global $LUXMED_STORAGE;
		$LUXMED_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('luxmed_storage_empty')) {
	function luxmed_storage_empty($var_name, $key='', $key2='') {
		global $LUXMED_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($LUXMED_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($LUXMED_STORAGE[$var_name][$key]);
		else
			return empty($LUXMED_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('luxmed_storage_isset')) {
	function luxmed_storage_isset($var_name, $key='', $key2='') {
		global $LUXMED_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($LUXMED_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($LUXMED_STORAGE[$var_name][$key]);
		else
			return isset($LUXMED_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('luxmed_storage_inc')) {
	function luxmed_storage_inc($var_name, $value=1) {
		global $LUXMED_STORAGE;
		if (empty($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = 0;
		$LUXMED_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('luxmed_storage_concat')) {
	function luxmed_storage_concat($var_name, $value) {
		global $LUXMED_STORAGE;
		if (empty($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = '';
		$LUXMED_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('luxmed_storage_get_array')) {
	function luxmed_storage_get_array($var_name, $key, $key2='', $default='') {
		global $LUXMED_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($LUXMED_STORAGE[$var_name][$key]) ? $LUXMED_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($LUXMED_STORAGE[$var_name][$key][$key2]) ? $LUXMED_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('luxmed_storage_set_array')) {
	function luxmed_storage_set_array($var_name, $key, $value) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if ($key==='')
			$LUXMED_STORAGE[$var_name][] = $value;
		else
			$LUXMED_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('luxmed_storage_set_array2')) {
	function luxmed_storage_set_array2($var_name, $key, $key2, $value) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if (!isset($LUXMED_STORAGE[$var_name][$key])) $LUXMED_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$LUXMED_STORAGE[$var_name][$key][] = $value;
		else
			$LUXMED_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('luxmed_storage_merge_array')) {
	function luxmed_storage_merge_array($var_name, $key, $value) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if ($key==='')
			$LUXMED_STORAGE[$var_name] = array_merge($LUXMED_STORAGE[$var_name], $value);
		else
			$LUXMED_STORAGE[$var_name][$key] = array_merge($LUXMED_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('luxmed_storage_set_array_after')) {
	function luxmed_storage_set_array_after($var_name, $after, $key, $value='') {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if (is_array($key))
			luxmed_array_insert_after($LUXMED_STORAGE[$var_name], $after, $key);
		else
			luxmed_array_insert_after($LUXMED_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('luxmed_storage_set_array_before')) {
	function luxmed_storage_set_array_before($var_name, $before, $key, $value='') {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if (is_array($key))
			luxmed_array_insert_before($LUXMED_STORAGE[$var_name], $before, $key);
		else
			luxmed_array_insert_before($LUXMED_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('luxmed_storage_push_array')) {
	function luxmed_storage_push_array($var_name, $key, $value) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($LUXMED_STORAGE[$var_name], $value);
		else {
			if (!isset($LUXMED_STORAGE[$var_name][$key])) $LUXMED_STORAGE[$var_name][$key] = array();
			array_push($LUXMED_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('luxmed_storage_pop_array')) {
	function luxmed_storage_pop_array($var_name, $key='', $defa='') {
		global $LUXMED_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($LUXMED_STORAGE[$var_name]) && is_array($LUXMED_STORAGE[$var_name]) && count($LUXMED_STORAGE[$var_name]) > 0) 
				$rez = array_pop($LUXMED_STORAGE[$var_name]);
		} else {
			if (isset($LUXMED_STORAGE[$var_name][$key]) && is_array($LUXMED_STORAGE[$var_name][$key]) && count($LUXMED_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($LUXMED_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('luxmed_storage_inc_array')) {
	function luxmed_storage_inc_array($var_name, $key, $value=1) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if (empty($LUXMED_STORAGE[$var_name][$key])) $LUXMED_STORAGE[$var_name][$key] = 0;
		$LUXMED_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('luxmed_storage_concat_array')) {
	function luxmed_storage_concat_array($var_name, $key, $value) {
		global $LUXMED_STORAGE;
		if (!isset($LUXMED_STORAGE[$var_name])) $LUXMED_STORAGE[$var_name] = array();
		if (empty($LUXMED_STORAGE[$var_name][$key])) $LUXMED_STORAGE[$var_name][$key] = '';
		$LUXMED_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('luxmed_storage_call_obj_method')) {
	function luxmed_storage_call_obj_method($var_name, $method, $param=null) {
		global $LUXMED_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($LUXMED_STORAGE[$var_name]) ? $LUXMED_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($LUXMED_STORAGE[$var_name]) ? $LUXMED_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('luxmed_storage_get_obj_property')) {
	function luxmed_storage_get_obj_property($var_name, $prop, $default='') {
		global $LUXMED_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($LUXMED_STORAGE[$var_name]->$prop) ? $LUXMED_STORAGE[$var_name]->$prop : $default;
	}
}
?>