<?php
date_default_timezone_set('America/Los_Angeles');
include("include/cron_define.php");
include("include/db_connect.php");
include("include/all_function.php");
include("../twilio-php/Services/Twilio.php");


$all_function = new all_function();

$query_order = "SELECT * FROM contact_message WHERE STATUS='0' AND message_time BETWEEN NOW() - INTERVAL 5 MINUTE AND NOW() + INTERVAL 5 MINUTE";
$result_order = mysqli_query($con,$query_order);
$num_rows_order = mysqli_num_rows($result_order);

if ($num_rows_order != 0) {
    $sid = $all_function->getSettingByCode($con,'TWILIO_ACCOUNT_SID'); //"ACaba8c97c9017f0014424d240a2ab0035"; // Your Account SID from www.twilio.com/user/account
    
    $token = $all_function->getSettingByCode($con,'TWILIO_ACCOUNT_TOKEN');
    
    $From = $all_function->getSettingByCode($con,'TWILIO_FROM_VALID_PHONE_NUMBER');
    
    $media_url_path = MAIN_SITE_PATH.'uploads/products/';

    while ($row = mysqli_fetch_array($result_order)) {
        $To = $all_function->getClientPhoneNumber($con,$row['contact_id']);
        
        $client = new Services_Twilio($sid, $token);
//           $test_data =  array(
//                        'To' => $To,
//                        'From' => $From,
//                        'Body' => $row['message'],
//                        'MediaUrl' => $media_url_path.$row['media_file'],
//                    );
//           print_r($test_data);
                if ($row['media_file'] != '') {
                    $client->account->messages->create(array(
                        'To' => $To,
                        'From' => $From,
                        'Body' => $row['message'],
                        'MediaUrl' => $media_url_path.$row['media_file'],
                    ));
                } else {
                    $client->account->messages->create(array(
                        'To' => $To,
                        'From' => $From,
                        'Body' => $row['message']
                    ));
                }
                
        $all_function->updateStatusSendSMS($con,$row['id']);
        
    }
}

?>