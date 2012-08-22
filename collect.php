<?php
function get_request_var($var_name, $default='') {
	$value = $default;
	if (array_key_exists($var_name, $_REQUEST)) 
		$value = $_REQUEST[$var_name];
	return $value;
}

function iso_date2() {
	date_default_timezone_set('Asia/Jerusalem'); 
	return date("Y-m-d h:i:s");
}

function puts($f, $s) {
	$fp = fopen($f, "w");
	$write = fputs($fp, $s);
	fclose($fp);
}

function append_to_file($f, $s) {
	$fp = fopen($f, "a");
	$write = fputs($fp, $s);
	fclose($fp);
}
ini_set('display_errors', '1');
error_reporting(E_ALL);
#$name=get_request_var('name');
$email=get_request_var('email');
#$comment=get_request_var('comment');
#$comment = str_replace("\n", " | ", $comment);
#$line = $name . "\t" . $email . "\t" . $comment;
$line = iso_date2() . "\t$email\n";
append_to_file('/var/www/vhosts/hakaveret.org.il/httpdocs/sites/default/files/.collected-kaveret-mails.txt', $line);

print "ok\n";
?>