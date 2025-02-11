#!/usr/bin/env php
<?php
#
# run php as a server.  Needed since we cannot specify the -S parameter with ENV inside the Dockerfile
#
	$host = '0.0.0.0';
	$port = getenv('PORT') ?: '5000';
	$docroot = __DIR__ . '/../www';
	$command = ['php', '-S', "$host:$port", '-t', $docroot];

	$mac_php = sprintf("/usr/local/Cellar/php/%s/bin/php", phpversion());

	if (is_executable("/usr/bin/php"))
	{
		$command[0] = "/usr/bin/php";
	}
	else if (is_executable("/usr/local/bin/php"))
	{
		$command[0] = "/usr/local/bin/php";
	}
	else if (is_executable($mac_php))
	{
		$command[0] = $mac_php;
	}

	printf("PHP version %s\n", phpversion());

	$descriptorspec = [
			0=>STDIN,
			1=>STDOUT,
			2=>STDERR
	];
	$process = proc_open($command, $descriptorspec, $pipes);
	printf("INFO: PHP server started on http://%s:%s (%s)\n", $host, $port, $process);

	//this will wait for the subprocess to finish
	proc_close($process);
	printf("INFO: PHP server exiting\n");

?>
