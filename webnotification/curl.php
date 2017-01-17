<?php 
$url = 'http://rsstexting.com/webnotification/twilioInboundSmsNotifications.php';

$fields = array(
    'username'      => "hidden",
    'password'      => "hidden",
    'sendername'    => "iZycon",
    'mobileno'      => 8443223
);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);
?>