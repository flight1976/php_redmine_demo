<?php

require_once 'config.inc.php';

function redmine_api($remote_url) {
	global $redmine_api_key; # X-Redmine-API-Key
        // 產生http認證header
        $opts = array(
                'http'=>array(
			'method'=>"GET",
			'header' => "X-Redmine-API-Key: $redmine_api_key"
                        )
                );
        $context = stream_context_create($opts);
        // Open the file using the HTTP headers set above
        $file_data = file_get_contents($remote_url, false, $context);
        return $file_data;

}

?>

