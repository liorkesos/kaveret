<?php

/**
* Envolve API Client Library
*
* @version 0.1
*/

/**
 * This method creates the full HTML that should be included in a page for an anonymous user.
 * @param string $apiKey Your site's Envolve API Key
 * @return string The HTML to include in the host page to activate Envolve.
 */
function envapi_get_code_for_anon_user($apiKey)
{
	return envapi_get_html($apiKey, envapi_get_logout_command($apiKey));
}

/**
 * This method creates the full HTML that should be included in a page for a logged-in user.
 * @param string apiKey Your site's Envolve API Key
 * @param string firstName The first name or username for the user. (required)
 * @param string lastName The last name of the user. Pass null if unused.
 * @param string picture An absolute URL to the location of the user's profile picture.
 * @param boolean isAdmin Is this user an administrator?
 * @return string The HTML to include in the host page to activate Envolve.
 */
function envapi_get_html_for_reg_user($apiKey, $firstName, $lastName, $picture, $isAdmin)
{
	$command = envapi_get_login_command($apiKey, $firstName, $lastName, $picture, $isAdmin);
	return envapi_get_html($apiKey, $command);
}

function envapi_get_html($apiKey, $command)
{
	$envolve_js_root = "http://d.envolve.com/env.nocache.js";
	//first, lets validate the args.
	$apiKeyPieces = preg_split('/-/', $apiKey);
	if((count($apiKeyPieces) != 2) || (((int) $apiKeyPieces[0]) == 0) )
	{
		error_log("EnvolveAPI: Invalid API Key");
		return;
	}
	$siteID = (int) $apiKeyPieces[0];
	
	$retVal = '<script type="text/javascript">' . "\n" . 'envoSn=' . $siteID . ';';
	if($command != NULL)
	{
		$retVal = $retVal . "\n" . 'env_commandString="' . $command . '";' . "\n";
	}
	$retVal = $retVal . '</script>';
	$retVal = $retVal . '<script type="text/javascript" src="' . $envolve_js_root . '"></script>';
	return $retVal;
}

/**
 * This method creates a login command string that can be passed to Envolve in order to
 * programmatically log a user in. Use this directly if you intend to use the Envolve JS API. Otherwise
 * you should use one of the functions above.
 * @param string apiKey Your site's Envolve API Key
 * @param string firstName The first name or username for the user. (required)
 * @param string lastName The last name of the user. Pass null if unused.
 * @param string picture An absolute URL to the location of the user's profile picture.
 * @param boolean isAdmin Is this user an administrator?
 * @return string The command string to pass to Envolve
 */
function envapi_get_login_command($apiKey, $firstName, $lastName, $picture, $isAdmin)
{
	$commandString =  "v=0.2,c=login,fn=" . base64_encode($firstName);
	if($firstName == NULL)
	{
		error_log("EnvolveAPI: You must provide a first name to log in to Envolve");
		return;
	}
	if($lastName != null)
	{
		$commandString = $commandString . ",ln=" . base64_encode($lastName);
	}
	if($picture != null)
	{
		$commandString = $commandString . ",pic=" . base64_encode($picture);
	}
	if($isAdmin)
	{
		$commandString = $commandString . ",admin=t";
	}
	return envapi_sign_command($apiKey, $commandString);	
}

/**
 * This method creates a logout command that tells Envolve to replace the current logged in user
 * with an anonymous (generated) username.
 * you should use one of the functions above.
 * @param string apiKey Your site's Envolve API Key
 * @return string The command string to pass to Envolve
 */
function envapi_get_logout_command($apiKey)
{
	return envapi_sign_command($apiKey, 'c=logout');	
}

function envapi_sign_command($apiKey, $command)
{
	//validate the args
	$apiKeyPieces = preg_split('/-/', $apiKey);
	if((count($apiKeyPieces) != 2) || (((int) $apiKeyPieces[0]) == 0) )
	{
		error_log("EnvolveAPI: Invalid API Key");
		return;
	}
	$secretKey = $apiKeyPieces[1];
	
	$data =  time() . '000' . ';' . $command;
	$hash = hash_hmac('sha1', utf8_encode($data), $secretKey, false);
	return $hash . ";" . $data;
}
?>
