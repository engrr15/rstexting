<?php
    date_default_timezone_set('America/Los_Angeles');
    include("include/cron_define.php");

    include("include/db_connect.php");

    include("include/all_function.php");

    $number = $_POST['From'];

    $body = $_POST['Body'];

    $all_function = new all_function();

    $client_id = $all_function->getClientIdByPhoneNumber($con,trim($number));//

    

    $insertData['contact_id'] = $client_id;

    $insertData['message'] = $body;

    $all_function->saveReplyMessage($con, $insertData);

    $all_function->updateLastMessageComesDate($con, $client_id);

    //remove below method after testing

    //$all_function->saveReplyInbound($con, $number,$body);
?>
<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response></Response>