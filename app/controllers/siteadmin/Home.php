<?php

/**
 * Reverse bidding system Login Class
 *
 * Permits to login to back end of the system.
 *
 * @package		Reverse bidding system
 * @subpackage	Controllers
 * @category	Access Controll
 * @author		Cogzidel Dev Team
 * @version		Version 1.0
 * @created		December 22 2008
 * @link		http://www.cogzidel.com

  <Reverse bidding system>
  Copyright (C) <2009>  <Cogzidel Technologies>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>
  If you want more information, please email me at bala.k@cogzidel.com or
  contact us from http://www.cogzidel.com/contact

 */
class Home extends CI_Controller {

    public $outputData;
    public $loggedInUser;

    /**
     * Constructor 
     *
     * Loads language files and models needed for this controller
     */
    public function __construct() {
        parent::__construct();
        require $this->config->item('basepath') . "twilio-php/Services/Twilio.php";
        //Check For Admin Logged in
        if (!isAdmin())
            redirect_admin('login');

        //Get Config Details From Db
        $this->load->database();

        $this->config_data->db_config_fetch();


        //Load the language file
        $this->lang->load('admin/common', $this->config->item('language_code'));
        $this->lang->load('admin/login', $this->config->item('language_code'));
        $this->lang->load('admin/validation', $this->config->item('language_code'));

        //load models required
        $this->load->model('common_model');
        $this->load->model('auth_model');
        $this->load->model('contact_model');
        $this->load->model('template_model');
        $this->load->model('settings_model');
        $this->load->model('country_model');
        $this->load->model('message_model');
        $this->load->library('form_validation');

        $this->outputData['totaltTodayMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m-d'), date('Y-m-d'));
        $this->outputData['totaltMonthMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m') . '-01', date('Y-m') . '-31');
        $this->outputData['totaltMessages'] = $this->message_model->totaltMessagesByDate('', '');
    }

//Controller Login End
    // --------------------------------------------------------------------

    /**
     * Loads admin login interface.
     *
     * @access	public
     * @param	nil
     * @return	void
     */
    function index() {
        if (!isAdmin())
            redirect_admin('login');
        else
            $this->outputData['adminlogin'] = '1';
        $order[0] = 'last_message_date';
        $order[1] = 'DESC';
        $contacts = $this->contact_model->getContacts(array(), '', array(), array(), $order);
        $this->outputData['contacts'] = $contacts;
        
        if (isset($contacts) and $contacts->num_rows() > 0) {
            $contacts_result = $contacts->result();
            $contact_detail = $contacts_result[0];
            $this->outputData['client_id'] = $C_id = $contact_detail->C_id;
            $this->outputData['client_name'] = $C_name = $contact_detail->C_name;
            $this->outputData['conersationUserInfo'] = $contact_detail->C_name . ' (' . $contact_detail->C_phone . ')';
            $order[0] = 'added_at';
            $order[1] = 'DESC';
            $messages = $this->message_model->getMessages(array('contact_id' => $C_id), '', array(), array(), $order);
            $this->outputData['messages'] = $messages;
        }

        $order[0] = 'list_order';
        $order[1] = 'ASC';
        $templates = $this->template_model->getTemplate(array(), '', array(), array(), $order);
        $this->outputData['templates'] = $templates;
        $country = $this->country_model->getCountrys(array(), '', array(), array(), array());
        $this->outputData['country'] = $country;

        $this->outputData['settings']	 = 	$this->settings_model->getSiteSettings();
        $this->load->view('admin/home', $this->outputData);
    }

//Function Index End

    function message_reply() {
        $this->form_validation->set_rules('client_id', 'Name ', 'trim|required');
        $this->form_validation->set_rules('message_reply', 'Message ', 'trim|required');
        if ($this->form_validation->run() == true) {

            $contacts = $this->contact_model->getContacts(array('C_id' => $this->input->post('client_id', TRUE)), '', array(), array(), array());
            $company_name = $this->settings_model->getSettingByCode('SITE_SIGNATURE ');
            if ($contacts->num_rows() > 0) {
                $contacts_result = $contacts->result();
                $contact_detail = $contacts_result[0];
                $numberwithcallingcode = $contact_detail->C_phone;

                $insertData = array();
                $insertData['contact_id'] = $this->input->post('client_id', TRUE);

                $message = $insertData['message'] = $this->input->post('message_reply', TRUE);
                $insertData['added_at'] = date('Y-m-d H:i:s');
                $inserted_id = $this->message_model->createMessage($insertData);
                $this->contact_model->updateContact(array('C_id'=>$this->input->post('client_id', TRUE)), array('last_message_date'=>date('Y-m-d H:i:s'),'is_replied'=>'1'));
                $messageHTML = '<div class="item">
                    <div class="item-head">
                            <div class="item-details">
                                    <a href="" class="item-name primary-link">'.$company_name.'</a>
                                    <span class="item-label">' . date('m/d/y h:i a', strtotime($insertData['added_at'])) . '</span>
                            </div>
                    </div>
                    <div class="item-body">' . $message . '</div>
            </div>';
                //Start send message from twilio to user
                $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID'); //"ACaba8c97c9017f0014424d240a2ab0035"; // Your Account SID from www.twilio.com/user/account
                $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN'); //"385b2f48d4044b17bf670915e31d469a"; // Your Auth Token from www.twilio.com/user/account
                try {
                    $client = new Services_Twilio($sid, $token);
                    $twilio_message = $client->account->messages->create(array(
                        'To' => $numberwithcallingcode,
                        'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
                        'Body' => $message
                    ));
                } catch (Exception $e) {
                    echo "The message was not sent!<br><br>";
                    echo $e->getMessage();
                    // If you don't see the previous message
                    // Check to see if your Twilio phone number is correct in the $fromNumber
                    // Check to see if the number you are texting is verified (the $toNumber)
                    // The $toNumber must be verified if you are using a trial Twilio account
//                    echo "From Number: " . $fromNumber." (must be your Twilio phone number)<br>";
//                    echo "To Number: " . $toNumber." (this must be a verified phone number if you are using a trial account)<br>";
//                    echo "Message: " . $message."<br>";
//                    echo "<br>";
                    exit;
                }
            }

            //End twilio sms
            $ajax_response['id'] = $inserted_id;
            $ajax_response['message'] = $messageHTML;
            $ajax_response['ok'] = 1;
            $ajax_response['sid'] = $twilio_message->sid;
        } else {
            $errors = $this->form_validation->error_array();
            $ajax_response['message'] = $errors;
            $ajax_response['ok'] = 0;
        }
        echo json_encode($ajax_response);
        exit;
    }

    function loadCustomerMessage() {
        $C_id = $this->input->post('id', TRUE);
        $contacts = $this->contact_model->getContacts(array('C_id' => $C_id), '', array(), array(), array());
        if ($contacts->num_rows() > 0) {
            $contacts_result = $contacts->result();
            $contact_detail = $contacts_result[0];
            $conersationUserInfo = $contact_detail->C_name . ' (' . $contact_detail->C_phone . ')';
            $contact_name = $contact_detail->C_name;
            $contact_phone = str_replace('+1', "", $contact_detail->C_phone);
        }
        $client_name = $contact_detail->C_name;
        $order[0] = 'added_at';
        $order[1] = 'DESC';
        $messageHTML = '';
        $company_name = $this->settings_model->getSettingByCode('SITE_SIGNATURE ');
        $messages = $this->message_model->getMessages(array('contact_id' => $C_id, 'status' => '1'), '', array(), array(), $order);
        if (isset($messages) and $messages->num_rows() > 0) {
            foreach ($messages->result() as $list) {
                $added_at = date('m/d/y g:iA', strtotime($list->added_at));//$this->all_function->timeAgo(strtotime($list->added_at));
                $messageHTML .= '<div class="item"><div class="item-head"><div class="item-details"><a href="" class="item-name primary-link">';
                $replied_by = ($list->type == '1') ? $company_name : $client_name;
                $messageHTML .= $replied_by . '</a><span class="item-label">' . $added_at . '</span></div></div><div class="item-body"><p>' . $list->message . '</p>';
                if ($list->media_file != '') {
                    $messageHTML .='<img src="' . base_url() . 'uploads/products/' . $list->media_file . '" width="160px">';
                }
                $messageHTML .= '</div></div>';
            }
        }
        $ajax_response['message'] = $messageHTML;
        $ajax_response['conersationUserInfo'] = $conersationUserInfo;
        $ajax_response['contact_name'] = $contact_name;
        $ajax_response['contact_phone'] = $contact_phone;
        echo json_encode($ajax_response);
        exit;
    }

    function send_message() {
        $this->form_validation->set_rules('C_name', 'Name ', 'trim|required');
        $this->form_validation->set_rules('C_phone', 'Number ', 'trim|required');
        $this->form_validation->set_rules('C_message', 'Message ', 'trim|required');
        $this->form_validation->set_rules('countrycallingcode', 'CallingCode ', 'trim|required');
        if ($this->form_validation->run() == true) {
            if(strlen($this->input->post('C_phone')) < 11){
                $numberwithcallingcode = $this->input->post('countrycallingcode', TRUE) . $this->input->post('C_phone', TRUE);
            }else{
                $numberwithcallingcode = $this->input->post('C_phone', TRUE);
                $numberwithcallingcode = str_replace(array('+','-',' ',')','(','_'), '', $numberwithcallingcode);
                $numberwithcallingcode = '+'.$numberwithcallingcode;
            }
            $contacts = $this->contact_model->getContacts(array('C_phone' => $numberwithcallingcode), '', array(), array(), array());
            if ($contacts->num_rows() > 0) {
                $contacts_result = $contacts->result();
                $contact_detail = $contacts_result[0];
                $C_id = $contact_detail->C_id;
            } else {
                $insertData = array();
                $insertData['C_name'] = $this->input->post('C_name', TRUE);
                $insertData['C_phone'] = $numberwithcallingcode;
                $insertData['last_message_date'] = date('Y-m-d H:i:s');
                $C_id = $this->contact_model->createContact($insertData);
            }
            
            $insertData = array();
            //collect media file
            $media_url = '';
            if (isset($_FILES['media_file']) && $_FILES['media_file'] != '') {

                if ($_FILES['media_file']['error'] == 0) {
                    $config['upload_path'] = str_replace('\\', '/', $this->config->item('basepath') . 'uploads/products/');
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['overwrite'] = false;
                    $config['remove_spaces'] = true;
                    $config['max_size'] = '10000'; // in KB

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('media_file')) {
                        print_r($this->upload->display_errors());
                        exit;
                    } else {
                        $insertData['media_file'] = $this->upload->file_name;
                        $media_url = base_url() . 'uploads/products/' . $insertData['media_file'];
                    }
                }
            }
            //end media file collection
            if ($this->input->post('message_date') != '') {
                $message_date = $this->input->post('message_date', TRUE);
                $message_time = $this->settings_model->getSettingByCode('SITE_DEFAULT_TIME');//$this->input->post('message_time', TRUE);

                $date = $message_date . ' ' . $message_time;
                $date = date('Y-m-d H:i:s',strtotime($date));
                $fromNumber = $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER');
                
                $dataQry = array('contactId' => $C_id, 'message' => $this->input->post('C_message', TRUE), 'media_file' => $media_url, 'message_time' => $date, 'toNumber' => $numberwithcallingcode, 'fromNumber' => $fromNumber);
                $this->db->insert('schedule_sms',$dataQry);
                $this->session->set_userdata('msgSuccess', 'Message Scheduled.');
            }else{
                //update last message date
                $this->contact_model->updateContact(array('C_id'=>$C_id), array('last_message_date'=>date('Y-m-d H:i:s'),'is_replied'=>'1'));

                $insertData['contact_id'] = $C_id;
                $insertData['message'] = $this->input->post('C_message', TRUE);
                $insertData['added_at'] = date('Y-m-d H:i:s');
                $inserted_id = $this->message_model->createMessage($insertData);
                //Start send message from twilio to user

                $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID'); //"ACaba8c97c9017f0014424d240a2ab0035"; // Your Account SID from www.twilio.com/user/account
                $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN'); //"385b2f48d4044b17bf670915e31d469a"; // Your Auth Token from www.twilio.com/user/account

                $client = new Services_Twilio($sid, $token);
                if ($media_url != '') {
                    $client->account->messages->create(array(
                        'To' => $numberwithcallingcode,
                        'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
                        'Body' => $this->input->post('C_message', TRUE),
                        'MediaUrl' => $media_url,
                    ));
                } else {
                    $client->account->messages->create(array(
                        'To' => $numberwithcallingcode,
                        'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
                        'Body' => $this->input->post('C_message', TRUE)
                    ));
                }

                $this->session->set_userdata('msgSuccess', 'Message Sent.');
            }
        } else {
            $errors = validation_errors();
            $this->session->set_userdata('msgError',$errors);
        }
        redirect_admin('home');
    }
    
    function webNotificationAlert() {
        $ajax_response['message'] = '';
        $ajax_response['contact_phone'] = '';
        $ajax_response['alert'] = 0;
        $notification = $this->message_model->getNotification();
        if (isset($notification) and $notification->num_rows() > 0) {
            foreach ($notification->result() as $list) {
                $ajax_response['message'] = $list->message;
                $ajax_response['contact_name'] = $list->C_name;
                $ajax_response['alert'] = 1;
                $this->message_model->updateMessage(array('id'=>$list->id),array('webnotification'=>'1'));

            }
        }
        
        echo json_encode($ajax_response);
        exit;
    }

}

//Class Login End 

/* End of file login.php */
/* Location: ./system/application/controllers/admin/login.php */