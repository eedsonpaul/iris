<?php
	$link = mysql_connect('localhost', 'root', '');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	@mysql_select_db("db_softeng2010", $link) or die( "Unable to select database");
?>