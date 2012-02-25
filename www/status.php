<?php

	$retVal = array("success" => True);

	$retVal["get_loaded_extensions()"] = get_loaded_extensions();
	$retVal["get_defined_constants()"] = get_defined_constants();
	$retVal["ini_get_all()"] = ini_get_all();
	$retVal["memory_get_usage()"] = memory_get_usage();
	$retVal["memory_get_peak_usage()"] = memory_get_peak_usage();
	$retVal["PHP_OS"] = PHP_OS;
	$retVal["php_sapi_name()"] = php_sapi_name();
	$retVal["php_uname()"] = php_uname();
	$retVal["PHP_VERSION_ID"] = PHP_VERSION_ID;
	$retVal["phpversion()"] = phpversion();
	$retVal["sys_get_temp_dir()"] = sys_get_temp_dir();

	header('Content-type: text/plain');
	echo json_encode($retVal);
?>
