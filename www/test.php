<?php

	$retVal = array("success" => True);


	$regex = $_REQUEST["regex"];
	$replacement = $_REQUEST["replacement"];

	$html = "<table class=\"table table-bordered table-striped bordered-table zebra-striped\" style=\"width:auto;\">";
	$html = $html . "\t<tbody>";

	$html = $html . "\t\t<tr>\n";
	$html = $html . "\t\t\t<td>Regular Expression</td>\n";
	$html = $html . "\t\t\t<td>";
	$html = $html . htmlspecialchars($regex);
	$html = $html . "</td>";
	$html = $html . "\t\t</tr>\n";

	$html = $html . "\t\t<tr>\n";
	$html = $html . "\t\t\t<td>as a PHP string</td>\n";
	$html = $html . "\t\t\t<td>&quot;";
	$html = $html . "&quot;</td>";
	$html = $html . "\t\t</tr>\n";

	$html = $html . "\t\t<tr>\n";
	$html = $html . "\t\t\t<td>Replacement</td>\n";
	$html = $html . "\t\t\t<td>";
	$html = $html . htmlspecialchars($replacement);
	$html = $html . "</td>\n";
	$html = $html . "\t\t</tr>\n";

	$html = $html . "\t</tbody>\n";
	$html = $html . "</table>\n";

	$retVal["html"] = $html;

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
		header("access-control-allow-origin: *");
		echo json_encode($retVal);
	}
?>
