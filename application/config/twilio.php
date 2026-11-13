<?php

defined('BASEPATH') or exit('No direct script access allowed');

$config['twilio'] = [

    'account_sid' => getenv('TWILIO_ACCOUNT_SID') ?: '',
	'api_key' 	 => getenv('TWILIO_API_KEY') ?: '',
    'api_secret' => getenv('TWILIO_API_SECRET') ?: '',  
	  
	  //Test Phone Number
    'from' => getenv('TWILIO_FROM_NUMBER') ?: '',
    
    // Extra configuration
    'application' => 'Example',
    'ssl' => FALSE,
];
