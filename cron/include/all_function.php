<?php

class all_function {
    /*
     * this function generates a random string. Basically used for auto-generated ids.
     */
    

    function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        // generate the random string
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        $time = mktime();
        $val = $time . $rand;

        return $val;
    }

    /*
     * This function returns site information .
     */
  function getSettingByCode($con,$option_name) {        
        $query="SELECT `string_value` FROM `settings` WHERE `code`='$option_name';";
        $result=  mysqli_query($con,$query);        
        $result_array=  mysqli_fetch_array($result);        
        $return_value=$result_array['string_value'];
        return $return_value;
    }
    
    function getClientPhoneNumber($con,$client_id){
        $query="SELECT `C_phone` FROM `contact` WHERE `C_id`='$client_id' AND `C_vis`='1';";
        $result=  mysqli_query($con,$query);        
        $result_array=  mysqli_fetch_array($result);        
        $return_value=$result_array['C_phone'];
        return $return_value;
    }
    
    function updateStatusSendSMS($con,$id){
        $query="UPDATE `contact_message` SET `status`='1' WHERE `id`='$id'";
        mysqli_query($con,$query);
    }
    
    function getClientIdByPhoneNumber($con,$phone_number){
        $query="SELECT `C_id` FROM `contact` WHERE `C_phone` LIKE '%$phone_number' AND `C_vis`='1';";
        
        $result=  mysqli_query($con,$query);        
        $result_array=  mysqli_fetch_array($result);        
        $return_value=$result_array['C_id'];
        return $return_value;
    }
    
    function saveReplyMessage($con,$insertData){
        $added_at = date('y-m-d H:i:s');
        $query="INSERT INTO `contact_message`(`contact_id`, `message`, `added_at`, `type`) VALUES ('".$insertData['contact_id']."','".$insertData['message']."','".$added_at."','2')";
        mysqli_query($con,$query);
    }
    
    function saveReplyInbound($con, $number,$body){
        
        $query="INSERT INTO `inboundsms`(`number`, `message`) VALUES ('$number','$body')";
        mysqli_query($con,$query);
    }
    
    function updateLastMessageComesDate($con,$id){
        $data = date('Y-m-d H:i:s');
        $query="UPDATE `contact` SET `last_message_date`='$data', `is_replied`='0' WHERE `C_id`='$id'";
        mysqli_query($con,$query);
    }
    

}

?>