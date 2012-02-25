<?php

	$retVal = array("success" => True);

	$retVal["PHP_VERSION_ID"] = PHP_VERSION_ID;
	$retVal["phpversion()"] = phpversion();

	echo json_encode($retVal);
?>
