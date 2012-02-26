<?php

	$retVal = array("success" => True);

	$retVal["html"] = "<p>It isn't ready yet!</p>";

	if (isset($_GET['callback']))
	{
		header('content-type: application/javascript; charset=utf-8');
		echo $_GET['callback'];
		echo "(";
		echo json_encode($retVal);
		echo ")";
	}
	else
	{
		header('content-type: application/json; charset=utf-8');
		header("access-control-allow-origin: *");
		echo json_encode($retVal);
	}
?>
