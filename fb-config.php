<?php

// Your Zendesk subdomain 
define('ZD_SUBDOMAIN', 'YOURSUBDOMAIN');
// Your Zendesk username 
define('ZD_EMAIL', 'YOUREMAIL');
// Your Zendesk API Token 
define('ZD_TOKEN', 'TOKEN');
// Username that will be allowed to use this script
define('PHP_AUTH_USER','RANDOMUSERNAME');
// Token for this user.
define('PHP_AUTH_PW', 'RANDOMTOKEN');
// Custom field ID
define('CUSTOM_FIELD_ID','CUSTOM_FIELD'); 

// Your Facebook Pages
// Format has to be the following for each page:
// PAGEID => "tag"
// Example:
// $facebook_pages = array(123456 => "zendesk",234567 => "zopim");
$facebook_pages = array(
		PAGEID1 => "page_tag1",
		PAGEID2 => "page_tag2"
	);
?>