<?php 

// set cronjob
// */1 * * * * /usr/local/bin/php -q /home/rsstextingadmin/public_html/index.php siteadmin smsScheduleCronjob index

class SmsScheduleCronjob extends CI_Controller{
	public function __construct(){
		parent::__construct();
		require $this->config->item('basepath') . "twilio-php/Services/Twilio.php";
	}

	public function index(){
		$this->load->model('settings_model');
		$this->db->select('*')->from('schedule_sms')->where('isProcess','No');
		$this->db->where('message_time < ',date('Y-m-d H:i:s'))->limit('200');
		$record = $this->db->get();
		if($record->num_rows() > 0){
			$sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID');
			$token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN');
			$processed = array();
			$qArray = array();
			foreach($record->result() as $rec){
				$this->db->set('isProcess','Yes')->where('id',$rec->id)->update('schedule_sms');
				$fromNumber = $rec->fromNumber;
				$toNumber = $rec->toNumber;
				$toNumber = str_replace(array(' ','-','_','(',')','+',','), '', $toNumber);
				if(strlen($toNumber) == 10){
					$toNumber = '1'.$toNumber;
				}
				$toNumber = '+'.$toNumber;
				$media = trim($rec->media_file);
				try{
					$client = new Services_Twilio($sid, $token);
					$msgArr = array('To' => $toNumber, 'From' => $fromNumber, 'Body' => $rec->message);
					if($media != ''){
						$msgArr['MediaUrl'] = $media;
                    }
                    $client->account->messages->create($msgArr);
                    $processed[] = $rec->id;
                    $qArray[] = array('last_message_date' => date('Y-m-d H:i:s'), 'C_id' => $rec->contactId);
				}catch(Exception $e){
					echo $e->getMessage();
				}
			}
			if(count($processed) > 0){
				$this->db->where_in('id',$processed)->delete('schedule_sms');
			}
			if(count($qArray) > 0){
				$this->db->update_batch('contact',$qArray,'C_id');
			}
		}

	}
}

?>