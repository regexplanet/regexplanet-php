<?php

	$retVal = array("success" => True);

	$retVal["error_get_last()"] = error_get_last();
	$retVal["error_reporting()"] = error_reporting();
	$retVal["gc_enabled()"] = gc_enabled();
	$retVal["get_current_user()"] = get_current_user();
	$retVal["getcwd()"] = getcwd();
	//no gae $retVal["gethostname()"] = gethostname();
	$retVal["get_loaded_extensions()"] = get_loaded_extensions();
	$retVal["gmdate(DATE_ISO8601)"] = gmdate(DATE_ISO8601);
	//too much: $retVal["get_defined_constants()"] = get_defined_constants();
	//too much: $retVal["ini_get_all()"] = ini_get_all();
	$retVal["memory_get_usage()"] = memory_get_usage();
	$retVal["memory_get_peak_usage()"] = memory_get_peak_usage();
	$retVal["microtime(True)"] = microtime(True);
	$retVal["PCRE_VERSION"] = PCRE_VERSION;
	$retVal["PHP_OS"] = PHP_OS;
	$retVal["php_sapi_name()"] = php_sapi_name();
	$retVal["php_uname()"] = php_uname();
	$retVal["PHP_VERSION_ID"] = PHP_VERSION_ID;
	$retVal["phpversion()"] = phpversion();
	$retVal["sys_getloadavg()"] = sys_getloadavg();
	$retVal["sys_get_temp_dir()"] = sys_get_temp_dir();
	$retVal["version"] = phpversion() . " (PCRE " . PCRE_VERSION . ")";

	if (isset($_REQUEST['callback']))
	{
		header('content-type: application/javascript; charset=utf-8');
		echo $_REQUEST['callback'];
		echo "(";
		echo json_encode($retVal);
		echo ")";
	}
	else
	{
		header('content-type: application/json; charset=utf-8');
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Methods: POST, GET');
		header('Access-Control-Max-Age: 604800');
		echo json_encode($retVal);
	}
?>
