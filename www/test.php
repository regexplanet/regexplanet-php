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
	$html = $html . "\t\t\t<td>as a PHP string (preg_quote)</td>\n";
	$html = $html . "\t\t\t<td>&quot;";
	$html = $html . htmlspecialchars(preg_quote($regex));
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

	$html = $html . "<table class=\"table table-bordered table-striped bordered-table zebra-striped\">\n";
	$html = $html . "\t<thead>\n";
	$html = $html . "\t\t<tr>\n";
	$html = $html . "\t\t\t<th style=\"text-align:center\">Test</th>\n";
	$html = $html . "\t\t\t<th>Target String</th>\n";
	$html = $html . "\t\t\t<th><a href=\"http://www.php.net/manual/en/function.preg-replace.php\">preg_replace()</a></th>\n";
	$html = $html . "\t\t</tr>\n";
	$html = $html . "\t</thead>\n";
	$html = $html . "\t<tbody>\n";

	$inputs = get_parameter_values("input");

	for ($loop = 0; $loop < count($inputs); $loop++)
	{
		$test = $inputs[$loop];

		$html = $html . "\t\t<tr>\n";
		$html = $html . "\t\t\t<td style=\"text-align:center\">";
		$html = $html . $loop;
		$html = $html . "</td>\n";

		$html = $html . "\t\t\t<td>";
		$html = $html . htmlspecialchars($test);
		$html = $html . "</td>\n";

		$html = $html . "\t\t</tr>\n";
	}

	$html = $html . "\t</tbody>\n";
	$html = $html . "<table>\n";

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

	//WTF?  PHP doesn't support this by default?!?
	function get_parameter_values($target)
	{
		//LATER: support for post from php_fix_raw_query at http://us.php.net/manual/en/reserved.variables.get.php
		$raw = $_SERVER['QUERY_STRING'];

		$arr = array();
		$pairs = explode('&', $raw);

		foreach ($pairs as $i)
		{
			if (!empty($i))
			{
				list($name, $value) = explode('=', $i, 2);

				if ($name == $target)
				{
					$arr[] = $value;
				}
			}
		}
		return $arr;
	}
?>
